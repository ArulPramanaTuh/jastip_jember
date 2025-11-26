<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // <-- Tambahkan ini

class AdminController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();
        $totalUsers = User::where('role', 'user')->count();
        $totalKurir = User::where('role', 'kurir')->count();
        $recentOrders = Order::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'completedOrders',
            'totalUsers',
            'totalKurir',
            'recentOrders'
        ));
    }

    // Kelola semua order
    public function orders()
    {
        $orders = Order::with(['user', 'kurir'])->latest()->paginate(20);
        $kurirs = User::where('role', 'kurir')->get();
        return view('admin.orders.index', compact('orders', 'kurirs'));
    }
    
    // Lihat detail order
    public function show($id)
    {
        $order = Order::with(['user', 'kurir'])->findOrFail($id);
        $kurirs = User::where('role', 'kurir')->get();
        return view('admin.orders.show', compact('order', 'kurirs'));
    }

    // Assign kurir ke order
    public function assignKurir(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        
        $request->validate([
            'kurir_id' => 'required|exists:users,id,role,kurir',
        ]);

        $order->update([
            'kurir_id' => $request->kurir_id,
            'status' => 'assigned',
        ]);

        return back()->with('success', 'Kurir berhasil di-assign!');
    }

    // Update status order
    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);
        
        $request->validate([
            'status' => 'required|in:pending,assigned,processing,picked_up,delivering,completed,cancelled',
        ]);

        $order->update(['status' => $request->status]);

        return back()->with('success', 'Status order berhasil diupdate!');
    }

    public function listUsers()
    {
        $users = User::where('role', 'user')->latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();
        return back()->with('success', 'User berhasil dihapus!');
    }

    public function toggleUserStatus($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();
        return back()->with('success', 'Status user diperbarui!');
    }

    public function listKurirs()
    {
        $kurirs = User::where('role', 'kurir')->latest()->paginate(20);
        return view('admin.kurirs.index', compact('kurirs'));
    }

    public function createKurir()
    {
        return view('admin.kurirs.create');
    }

    public function storeKurir(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'kurir',
        ]);

        return redirect()->route('admin.kurirs.index')->with('success', 'Kurir berhasil ditambahkan!');
    }

    public function deleteKurir($id)
    {
        $kurir = User::where('role', 'kurir')->findOrFail($id);
        $kurir->delete();
        return back()->with('success', 'Kurir berhasil dihapus!');
    }

    public function toggleKurirStatus($id)
    {
        $kurir = User::where('role', 'kurir')->findOrFail($id);
        $kurir->is_active = !$kurir->is_active;
        $kurir->save();
        return back()->with('success', 'Status kurir diperbarui!');
    }
}