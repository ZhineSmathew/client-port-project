<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:12',
            'profile_image' => $request->isMethod('post')
                    ? 'required|image|mimes:jpg,jpeg,png|max:2048'
                    : 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->email = $validated['email'];
        $user->phone = $validated['phone'];

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
        }

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

}
