<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Tampilkan form buat order baru
    public function create()
    {
        return view('user.orders.create');
    }

    // Simpan order baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'purchase_location' => 'required|string|max:500',
            'delivery_address' => 'required|string|max:500',
            'estimated_price' => 'required|numeric|min:0',
        ]);

        // Hitung biaya pengiriman otomatis berdasarkan alamat pengiriman
        $shipping_cost = $this->calculateShippingCost($request->delivery_address);

        Order::create([
        'user_id' => Auth::id(),
        'item_name' => $request->item_name,
        'item_price' => $request->estimated_price,
        'estimated_price' => $request->estimated_price,
        'pickup_address' => $request->purchase_location,
        'delivery_address' => $request->delivery_address,
        'shipping_cost' => $shipping_cost,
        'total_price' => $request->estimated_price + $shipping_cost,
        'status' => 'pending',
    ]);

        return redirect()->route('user.dashboard')->with('success', 'Order berhasil dibuat!');
    }
    
        public function show($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        return view('user.orders.show', compact('order'));
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->latest()->get();
        return view('user.orders.index', compact('orders'));
    }
    // Fungsi untuk menghitung biaya pengiriman berdasarkan jarak (km)
    private function calculateShippingCost($deliveryAddress)
    {
        // Estimasi jarak berdasarkan alamat
        $distance = $this->estimateDistance($deliveryAddress);

        // Tarif per km = 800
        $ratePerKm = 800;

        return ceil($distance) * $ratePerKm;
    }

    // Fungsi untuk mengestimasi jarak (dalam km) berdasarkan kata kunci di alamat
    private function estimateDistance($address)
    {
        // Jika alamat mengandung "Jember", anggap jarak 5 km
        if (stripos($address, 'Jember') !== false) {
            return 5;
        }
        // Jika alamat mengandung "Surabaya", anggap jarak 100 km
        elseif (stripos($address, 'Surabaya') !== false) {
            return 100;
        }
        // Jika alamat mengandung "Malang", anggap jarak 80 km
        elseif (stripos($address, 'Malang') !== false) {
            return 80;
        }
        // Default: 50 km
        else {
            return 50;
        }
    }
}