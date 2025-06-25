<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Storage;
class ProfileController extends Controller
{
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with('success', 'Password changed successfully.');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'social' => 'nullable|array',
        ]);

        if ($request->hasFile('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $avatarPath = $request->file('avatar')->store('avatars');
            $user->avatar = $avatarPath;
        }

        $user->update([
            'name' => $request->name,
            
            'phone' => $request->phone,
            'address' => $request->address,
            'social' => json_encode($request->social),
        ]);

        return back()->with('success', 'Profile updated successfully.');
    }

    public function removeAvatar()
    {
        $user = Auth::user();
        if ($user->avatar) {
            Storage::delete($user->avatar);
            $user->avatar = null;
            $user->save();
        }

        return back()->with('success', 'Profile picture removed.');
    }
}
