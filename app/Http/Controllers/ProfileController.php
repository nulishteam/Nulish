<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create()
    {
        return view('user-area.profile');
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
