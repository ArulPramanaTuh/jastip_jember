<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KurirController extends Controller
{
    public function index()
    {
        $kurir = Auth::user();
        $myOrders = $kurir->kurirOrders()->latest()->take(5)->get();
        $totalOrders = $kurir->kurirOrders()->count();
        $activeOrders = $kurir->kurirOrders()->whereIn('status', ['picked_up', 'delivering'])->count();
        $completedOrders = $kurir->kurirOrders()->where('status', 'completed')->count();

        return view('kurir.dashboard', compact('kurir', 'myOrders', 'totalOrders', 'activeOrders', 'completedOrders'));
    }

    // Lihat semua order yang di-assign ke kurir ini
    public function orders()
    {
        $orders = Auth::user()->kurirOrders()->latest()->paginate(20);
        return view('kurir.orders.index', compact('orders'));
    }

    // Lihat detail order
    public function show($id)
    {
        $order = Order::where('kurir_id', Auth::id())->findOrFail($id);
        return view('kurir.orders.show', compact('order'));
    }

    // Update status pesanan dengan validasi alur
    public function updateStatus(Request $request, $id)
    {
        $order = Order::where('kurir_id', Auth::id())->findOrFail($id);

        $request->validate([
            'status' => 'required|in:picked_up,delivering,completed'
        ]);

        // Validasi alur status
        $validTransitions = [
            'assigned' => ['picked_up'],
            'picked_up' => ['delivering'],
            'delivering' => ['completed']
        ];

        $current = $order->status;
        $next = $request->status;

        if (!in_array($next, $validTransitions[$current] ?? [])) {
            return back()->withErrors(['status' => 'Transisi status tidak valid.']);
        }

        $order->update(['status' => $next]);

        return back()->with('success', 'Status pesanan diperbarui!');
    }
}