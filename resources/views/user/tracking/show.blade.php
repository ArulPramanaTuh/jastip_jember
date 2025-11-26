<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracking Pesanan - Jastip Jember</title>
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
                        <p class="text-sm text-gray-600">Lacak Pesanan Anda</p>
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
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Lacak Pesanan</h2>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <h4 class="font-bold text-lg text-gray-800">{{ $order->item_name }}</h4>
                    <p class="text-gray-600 text-sm mt-1">
                        📍 {{ Str::limit($order->delivery_address, 50) }}
                    </p>
                    <p class="text-gray-500 text-xs mt-1">
                        {{ $order->created_at->diffForHumans() }}
                    </p>
                </div>
                <div class="text-right">
                    <p class="font-bold text-xl text-blue-600">
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </p>
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

            <!-- Timeline Status -->
            <div class="mt-6 border-l-2 border-gray-200 pl-4">
                <div class="flex items-start mb-3">
                    <div class="w-3 h-3 bg-gray-300 rounded-full mt-1 mr-3"></div>
                    <div>
                        <p class="text-sm font-medium text-gray-700">Pesanan Dibuat</p>
                        <p class="text-xs text-gray-500">{{ $order->created_at->format('d M Y H:i') }}</p>
                    </div>
                </div>

                @if($order->status != 'pending')
                    <div class="flex items-start mb-3">
                        <div class="w-3 h-3 bg-blue-500 rounded-full mt-1 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-blue-800">Kurir Menerima Pesanan</p>
                            <p class="text-xs text-gray-500">{{ $order->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                @endif

                @if(in_array($order->status, ['picked_up', 'delivering', 'completed']))
                    <div class="flex items-start mb-3">
                        <div class="w-3 h-3 bg-orange-500 rounded-full mt-1 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-orange-800">Barang Dibeli</p>
                            <p class="text-xs text-gray-500">Sedang diupdate oleh kurir</p>
                        </div>
                    </div>
                @endif

                @if(in_array($order->status, ['delivering', 'completed']))
                    <div class="flex items-start mb-3">
                        <div class="w-3 h-3 bg-purple-500 rounded-full mt-1 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-purple-800">Dalam Perjalanan</p>
                            <p class="text-xs text-gray-500">Sedang diupdate oleh kurir</p>
                        </div>
                    </div>
                @endif

                @if($order->status == 'completed')
                    <div class="flex items-start mb-3">
                        <div class="w-3 h-3 bg-green-500 rounded-full mt-1 mr-3"></div>
                        <div>
                            <p class="text-sm font-medium text-green-800">Pesanan Selesai</p>
                            <p class="text-xs text-gray-500">{{ $order->updated_at->format('d M Y H:i') }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Kurir Info -->
            @if($order->kurir)
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-sm text-gray-600">
                        👤 Kurir: <span class="font-medium">{{ $order->kurir->name }}</span>
                    </p>
                    @if($order->kurir->phone)
                        <p class="text-sm text-gray-600">
                            📞 {{ $order->kurir->phone }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('user.orders.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg transition duration-200">
                ← Kembali ke Riwayat Pesanan
            </a>
        </div>
    </div>
</body>
</html>