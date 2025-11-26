<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    // Tampilkan halaman profil
    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.show', compact('user'));
    }

    // Tampilkan form edit profil
    public function edit()
    {
        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    // Simpan perubahan profil
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }
        
        // Upload foto profil jika ada
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

        return redirect()->route('admin.profile.show')->with('success', 'Profil berhasil diperbarui!');
    }
} 