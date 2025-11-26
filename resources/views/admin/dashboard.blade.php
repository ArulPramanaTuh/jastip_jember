<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-gradient-to-r from-indigo-800 to-purple-900 shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-purple-600 text-white rounded-full p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Jastip Jember</h1>
                        <p class="text-sm text-purple-200">Admin Panel</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">Admin</span>
                    <a href="{{ route('admin.profile.show') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
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
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-purple-600 to-indigo-600 rounded-2xl shadow-xl p-8 mb-8 text-white">
            <h2 class="text-3xl font-bold mb-2">Halo, Admin! 👋</h2>
            <p class="text-purple-100">Kelola semua pesanan, kurir, dan pengguna dengan mudah</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-8">
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

            <!-- Pending Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Menunggu Persetujuan</p>
                        <h3 class="text-3xl font-bold text-yellow-600 mt-2">{{ $pendingOrders }}</h3>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <!-- Total Users -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Pengguna Aktif</p>
                        <h3 class="text-3xl font-bold text-purple-600 mt-2">{{ $totalUsers }}</h3>
                    </div>
                    <div class="bg-purple-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Kurir -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Kurir Aktif</p>
                        <h3 class="text-3xl font-bold text-orange-600 mt-2">{{ $totalKurir }}</h3>
                    </div>
                    <div class="bg-orange-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <a href="{{ route('admin.orders.index') }}" class="bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white rounded-xl shadow-lg p-6 flex items-center justify-between transform hover:scale-105 transition duration-200">
                <div>
                    <h3 class="text-xl font-bold mb-2">Kelola Pesanan</h3>
                    <p class="text-blue-100">Lihat & assign kurir</p>
                </div>
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </a>

            <a href="{{ route('admin.users.index') }}" class="bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white rounded-xl shadow-lg p-6 flex items-center justify-between transform hover:scale-105 transition duration-200">
                <div>
                    <h3 class="text-xl font-bold mb-2">Kelola User</h3>
                    <p class="text-green-100">Lihat dan kelola pengguna</p>
                </div>
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                </svg>
            </a>

            <a href="{{ route('admin.kurirs.index') }}" class="bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white rounded-xl shadow-lg p-6 flex items-center justify-between transform hover:scale-105 transition duration-200">
                <div>
                    <h3 class="text-xl font-bold mb-2">Kelola Kurir</h3>
                    <p class="text-purple-100">Lihat, tambah, & suspend kurir</p>
                </div>
                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
            </a>
        </div>

        <!-- Recent Orders Section -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
                Pesanan Terbaru
            </h3>

            @if($recentOrders->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b-2 border-gray-200">
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">User</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Barang</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Total</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Status</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Kurir</th>
                                <th class="text-left py-3 px-4 font-semibold text-gray-700">Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentOrders as $order)
                                <tr class="border-b border-gray-100 hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $order->user->name }}</td>
                                    <td class="py-3 px-4">{{ $order->item_name }}</td>
                                    <td class="py-3 px-4 font-semibold text-blue-600">
                                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($order->status == 'completed') bg-green-100 text-green-800
                                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                                            @elseif(in_array($order->status, ['processing', 'picked_up', 'delivering'])) bg-blue-100 text-blue-800
                                            @else bg-yellow-100 text-yellow-800
                                            @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4">
                                        {{ $order->kurir ? $order->kurir->name : '-' }}
                                    </td>
                                    <td class="py-3 px-4 text-sm text-gray-600">
                                        {{ $order->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-12">
                    <svg class="w-24 h-24 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">Belum ada pesanan</h4>
                    <p class="text-gray-500">Tidak ada pesanan baru saat ini</p>
                </div>
            @endif
        </div>
    </div>
</body>
</html>