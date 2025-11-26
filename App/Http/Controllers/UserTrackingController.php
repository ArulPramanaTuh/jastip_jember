<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTrackingController extends Controller
{
    public function show($id)
    {
        $order = Order::where('user_id', Auth::id())->with('kurir')->findOrFail($id);

        return view('user.tracking.show', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', auth()->id())
            ->with('kurir')
            ->latest()
            ->get();

        return view('user.tracking', compact('orders'));
    }
}