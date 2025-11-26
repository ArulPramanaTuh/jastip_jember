<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
            <!-- Navbar -->
        <nav class="bg-white shadow-lg">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <!-- Bagian Kiri: Logo & Judul -->
                    <div class="flex items-center space-x-3">
                        <div class="bg-blue-600 text-white rounded-full p-3">
                            @if(Auth::user()->profile_photo_path)
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}" alt="Foto Profil" class="w-6 h-6 rounded-full object-cover">
                            @else
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            @endif
                        </div>
                        <div>
                            <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                            <p class="text-sm text-gray-600">Jasa Titip Terpercaya</p>
                        </div>
                    </div>

                    <!-- Bagian Kanan: Nama User, Profil, Logout -->
                    <div class="flex items-center space-x-4">
                        <span class="text-gray-700 font-medium">{{ $user->name }}</span>

                        <!-- Tombol Profil -->
                        <a href="{{ route('user.profile.show') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
                            Profil
                        </a>

                        <!-- Tombol Logout -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
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
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl shadow-xl p-8 mb-8 text-white">
            <h2 class="text-3xl font-bold mb-2">Selamat Datang, {{ $user->name }}! 👋</h2>
            <p class="text-blue-100">Kelola pesanan jastip Anda dengan mudah</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Pesanan</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</h3>
                    </div>
                    <div class="bg-blue-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Sedang Proses</p>
                        <h3 class="text-3xl font-bold text-orange-600 mt-2">{{ $activeOrders }}</h3>
                    </div>
                    <div class="bg-orange-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Selesai</p>
                        <h3 class="text-3xl font-bold text-green-600 mt-2">{{ $completedOrders }}</h3>
                    </div>
                    <div class="bg-green-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <a href="{{ route('user.orders.create') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-xl shadow-lg p-6 flex items-center justify-between transform hover:scale-105 transition duration-200">
                <div>
                    <h3 class="text-xl font-bold mb-2">Buat Pesanan Baru</h3>
                    <p class="text-green-100">Pesan jastip sekarang</p>
                </div>
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
            </a>

            <a href="{{ route('user.orders.index') }}" class="bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white rounded-xl shadow-lg p-6 flex items-center justify-between transform hover:scale-105 transition duration-200">
                <div>
                    <h3 class="text-xl font-bold mb-2">Lihat Semua Pesanan</h3>
                    <p class="text-purple-100">Riwayat & status pesanan</p>
                </div>
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </a>
        </div>

        <!-- Recent Orders -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Pesanan Terbaru
            </h3>

            @if($orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
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
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">Belum ada pesanan</h4>
                    <p class="text-gray-500 mb-6">Mulai pesan jastip sekarang!</p>
                    <a href="{{ route('user.orders.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                        Buat Pesanan Pertama
                    </a>
                    <a href="{{ route('user.tracking.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg ml-4">
                        Lacak Pesanan
                    </a>
                </div>
            @endif
        </div>
        <!-- Tombol Buat Pesanan Baru
        <div class="mt-8 text-center">
            <a href="{{ route('user.orders.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                Buat Pesanan Baru
            </a> -->
    </div>
</body>
</html>