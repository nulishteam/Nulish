<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('user-area.profile');
    }

    public function show($key)
    {
        $user = User::where('user_key', $key)->first();
        // dd($user);
        if ($user == null) {
            abort(404);
        }
        $now = new Carbon();
        $answers = Answer::where('user_id', $user->id)->with('question')->paginate(20);
        return view('user-area.profile', compact('user', 'answers', 'now'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,',
            'name' => 'required',
            'phone' => 'required|max:10',
            'about' => 'required:max:150',
            'location' => 'required',
        ]);
        // $user = request()->user();
        // $attributes = request()->validate([
        //     'email' => 'required|email|unique:users,email,' . $user->id,
        //     'name' => 'required',
        //     'phone' => 'required|max:10',
        //     'about' => 'required:max:150',
        //     'location' => 'required',
        // ]);

        auth(function ($request) {
            User::updateOrCreate(
                ['id' => $request->id],
                $request->all(),
            );
        });
        return back()->withStatus('Profile successfully updated.');
    }
}
