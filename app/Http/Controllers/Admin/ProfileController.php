<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Show Admin Profile Edit Page
     */
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    /**
     * Update Admin Profile (Name and Email)
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => [
                'required',
                'email',
                'max:150',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return back()->with('success_profile', 'Admin profile (Name & Email) updated successfully!');
    }

    /**
     * Update Admin Password
     */
    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            'current_password.current_password' => 'The current password you entered is incorrect.',
            'password.confirmed' => 'The new password confirmation does not match.',
            'password.min' => 'The new password must be at least 6 characters long.',
        ]);

        $user->password = Hash::make($validated['password']);
        $user->save();

        return back()->with('success_password', 'Password has been changed successfully!');
    }
}
