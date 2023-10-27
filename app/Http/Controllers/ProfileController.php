<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
        $answers = Answer::where('user_id', $user->id)->orderBy('created_at', 'DESC')->with('question')->paginate(10);
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
