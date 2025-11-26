<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 

class UserProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('user.profile.show', compact('user'));
    }
    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();
        // dd($request->file('profile_photo'));
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Max 2MB
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ];

        // Jika password diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Jika upload foto profil
        if ($request->hasFile('profile_photo')) {
            // Hapus foto lama jika ada
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan foto baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');
            $data['profile_photo_path'] = $path;
        }

        $user->update($data);

        return redirect()->route('user.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}