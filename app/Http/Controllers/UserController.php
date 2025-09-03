<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members',
            'password' => 'required|confirmed|min:6',
        ]);

        // Insert into members table and get the new member object
        $user = Member::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0, // normal user by default
        ]);

        // Save session so user is logged in immediately
        session([
            'member_id' => $user->id,
            'member_name' => $user->name,
            'is_admin' => $user->is_admin,
        ]);

        // Redirect to profile
        return redirect()->route('profile')->with('success', 'Registration successful!');
    }
}