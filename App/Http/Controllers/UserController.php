<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $orders = $user->orders()->latest()->take(5)->get();
        $totalOrders = $user->orders()->count();
        $completedOrders = $user->orders()->where('status', 'completed')->count();
        $activeOrders = $user->orders()->whereIn('status', ['paid', 'processing', 'picked_up', 'delivering'])->count();

        return view('user.dashboard', compact('user', 'orders', 'totalOrders', 'completedOrders', 'activeOrders'));
    }

    // ✅ Method untuk menampilkan halaman edit profil
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile.edit', compact('user'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('user.profile.show', compact('user'));
    }

    // ✅ Method untuk menyimpan perubahan profil
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // nullable = tidak wajib diisi
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Jika password diisi, update password
        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('user.profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}