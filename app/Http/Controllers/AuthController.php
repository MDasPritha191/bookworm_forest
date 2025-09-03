<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use App\Models\Book;

class AuthController extends Controller
{
    public function log_in(Request $request)
{
    // Validate input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Find user by email
    $member = Member::where('email', $request->email)->first();

    // Check credentials
    if ($member && Hash::check($request->password, $member->password)) {
        // Save session
        session([
            'member_id' => $member->id,
            'member_name' => $member->name,
            'is_admin' => $member->is_admin
        ]);

        // Redirect based on role
        if ($member->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('profile');
    }

    return back()->withErrors(['email' => 'Invalid credentials']);
}

    // public function login(Request $request)
    // {
    //     // Validate input
    //     $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     // Find user by email
    //     $member = Member::where('email', $request->email)->first();

    //     if ($member && Hash::check($request->password, $member->password)) {
    //         // Password matches → login successful
    //         session(['member_id' => $member->id, 'member_name' => $member->name]);

        
    //         // Redirect based on role (assumes 'is_admin' column exists)
    //         if ($member->is_admin) {
    //             return redirect()->route('admin.dashboard'); // Admin dashboard
    //         }
           

    //         // Default redirect for normal users
    //         return redirect()->route('profile');
    //     }

        


   
    public function profile()
    {
        $member_id = session('member_id');
        if (!$member_id) {
            return redirect('/login');
        }

        $member_name = session('member_name');

        // Fetch all books for this member
        $books = Book::where('member_id', $member_id)->get();

        return view('profile', compact('member_name', 'member_id', 'books'));
    }

    // Show edit form
    public function edit()
    {
        $member_id = session('member_id');
        if (!$member_id) {
            return redirect('/login');
        }

        $member = Member::find($member_id);

        return view('edit-profile', ['member' => $member]);
    }


    // Handle update
    public function update(Request $request)
    {
        $member_id = session('member_id');
        if (!$member_id) {
            return redirect('/login');
        }

        $member = Member::find($member_id);

        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,'.$member_id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        // Update fields
        $member->name = $request->name;
        $member->email = $request->email;

        if ($request->password) {
            $member->password = Hash::make($request->password);
        }

        $member->save();
        
        // Also update the name in the session
        session(['member_name' => $member->name]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}


