<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya - Kurir Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-indigo-600 text-white rounded-full p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Kurir Dashboard</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <a href="{{ route('kurir.profile.show') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                        Profil
                    </a>
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
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Pesanan Saya</h2>
            <a href="{{ route('kurir.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                ← Kembali ke Dashboard
            </a>
        </div>

        @if($orders->count() > 0)
            <div class="space-y-6">
                @foreach($orders as $order)
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
                                    @elseif(in_array($order->status, ['assigned', 'picked_up', 'delivering'])) bg-blue-100 text-blue-800
                                    @else bg-yellow-100 text-yellow-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Tombol Lihat Detail & Update Status -->
                        <div class="mt-4 text-center space-x-2">
                            <a href="{{ route('kurir.orders.show', $order->id) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                                Lihat Detail
                            </a>

                            @if(in_array($order->status, ['assigned', 'picked_up', 'delivering']))
                                <form method="POST" action="{{ route('kurir.orders.update-status', $order->id) }}" class="inline">
                                    @csrf
                                    <select name="status" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                                        @if($order->status == 'assigned')
                                            <option value="picked_up">Diambil</option>
                                        @elseif($order->status == 'picked_up')
                                            <option value="delivering">Dalam Pengiriman</option>
                                        @elseif($order->status == 'delivering')
                                            <option value="completed">Selesai</option>
                                        @endif
                                    </select>
                                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white px-3 py-2 rounded-lg ml-2 text-sm">
                                        Update Status
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-6">
                {{ $orders->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h4 class="text-xl font-semibold text-gray-600 mb-2">Belum ada pesanan</h4>
                <p class="text-gray-500">Tunggu admin menugaskan pesanan.</p>
            </div>
        @endif
    </div>
</body>
</html>