<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RedirectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return Redirect::route('admin.dashboard');
        } elseif ($user->role === 'kurir') {
            return Redirect::route('kurir.dashboard');
        } elseif ($user->role === 'user') {
            return Redirect::route('user.dashboard');
        }

        // Fallback jika role tidak dikenali
        return Redirect::route('login')->with('error', 'Role tidak valid.');
    }
}