<?php

namespace App\Http\Controllers;

use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        return view('admin.pages.profile', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(), // Ensure the email is unique except for the current user
            'old_password' => 'required',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        $user = Auth::user();

 
        if (!Hash::check($request->old_password, $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => 'The current password does not match our records.'
            ]);
        }

        // Update user profile
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        // If a new password is provided, update the password
        if ($request->filled('new_password')) {
            $user->password = Hash::make($request->new_password);
        }

        // Save the updated user information
        $user->save();

        // Redirect or return a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
