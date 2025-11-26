<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-blue-600 text-white rounded-full p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Detail Pesanan Anda</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Detail Pesanan</h2>

        <div class="bg-white rounded-xl shadow-lg p-6 max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Barang</h3>
                    <p class="text-gray-600 mt-2">{{ $order->item_name }}</p>
                </div>
                <div>
                    <h3 class="text-xl font-semibold text-gray-800">Status</h3>
                    <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-semibold
                        @if($order->status == 'completed') bg-green-100 text-green-800
                        @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                        @elseif(in_array($order->status, ['processing', 'picked_up', 'delivering'])) bg-blue-100 text-blue-800
                        @else bg-yellow-100 text-yellow-800
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
            </div>

            <div class="mt-6 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-800">Alamat Pengiriman</h3>
                <p class="text-gray-600 mt-2">{{ $order->delivery_address }}</p>
            </div>

            <div class="mt-6 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-800">Lokasi Pembelian</h3>
                <p class="text-gray-600 mt-2">{{ $order->pickup_address }}</p>
            </div>

            <div class="mt-6 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-800">Biaya & Total</h3>
                <div class="mt-2 space-y-2">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Estimasi Harga Barang:</span>
                        <span>Rp {{ number_format($order->item_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Biaya Pengiriman:</span>
                        <span>Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-lg">
                        <span>Total Harga:</span>
                        <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <a href="{{ route('user.orders.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                    Kembali ke Riwayat
                </a>
            </div>
        </div>
    </div>
</body>
</html>