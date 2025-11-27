<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurir Dashboard - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes pulse-ring {
            0% {
                transform: scale(0.8);
                opacity: 1;
            }
            100% {
                transform: scale(1.3);
                opacity: 0;
            }
        }
        
        .pulse-ring {
            animation: pulse-ring 1.5s ease-out infinite;
        }
        
        .toggle-switch {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .toggle-switch:hover {
            transform: scale(1.05);
        }
        
        .status-badge {
            animation: slideIn 0.3s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-green-50 to-emerald-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-emerald-600 text-white rounded-full p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Kurir Dashboard</p>
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    <span class="text-gray-700 font-medium">{{ $kurir->name }}</span>

                    <!-- Enhanced Toggle Availability Button -->
                    <div class="flex items-center space-x-3">
                        <!-- Status Badge -->
                        <div class="status-badge">
                            @if($kurir->is_available)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800 border border-green-300">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                                    Online
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800 border border-gray-300">
                                    <span class="w-2 h-2 bg-gray-500 rounded-full mr-2"></span>
                                    Offline
                                </span>
                            @endif
                        </div>

                        <!-- Toggle Button -->
                        <form method="POST" action="{{ route('kurir.toggle-availability') }}" class="relative">
                            @csrf
                            @method('PATCH')
                            <div class="relative">
                                @if($kurir->is_available)
                                    <!-- Pulse Ring for Active State -->
                                    <div class="absolute inset-0 bg-green-400 rounded-full pulse-ring"></div>
                                @endif
                                
                                <button type="submit" 
                                    class="toggle-switch relative flex items-center justify-center w-14 h-14 rounded-full shadow-lg transition-all duration-300 {{ $kurir->is_available ? 'bg-gradient-to-br from-green-500 to-green-600 hover:from-green-600 hover:to-green-700' : 'bg-gradient-to-br from-gray-400 to-gray-500 hover:from-gray-500 hover:to-gray-600' }}"
                                    title="{{ $kurir->is_available ? 'Klik untuk offline' : 'Klik untuk online' }}">
                                    
                                    @if($kurir->is_available)
                                        <!-- Power On Icon -->
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    @else
                                        <!-- Power Off Icon -->
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                    @endif
                                </button>
                            </div>
                        </form>
                    </div>

                    <a href="{{ route('kurir.profile.show') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition duration-200 shadow-md hover:shadow-lg">
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
        <div class="bg-gradient-to-r from-emerald-600 to-teal-600 rounded-2xl shadow-xl p-8 mb-8 text-white">
            <h2 class="text-3xl font-bold mb-2">Halo, {{ $kurir->name }}! 👋</h2>
            <p class="text-emerald-100">Kelola pesanan Anda dengan mudah</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total Orders</p>
                        <h3 class="text-3xl font-bold text-gray-800 mt-2">{{ $totalOrders }}</h3>
                    </div>
                    <div class="bg-emerald-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Active Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Active Orders</p>
                        <h3 class="text-3xl font-bold text-orange-600 mt-2">{{ $activeOrders }}</h3>
                    </div>
                    <div class="bg-orange-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Completed Orders -->
            <div class="bg-white rounded-xl shadow-lg p-6 transform hover:scale-105 transition duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Completed Orders</p>
                        <h3 class="text-3xl font-bold text-green-600 mt-2">{{ $completedOrders }}</h3>
                    </div>
                    <div class="bg-green-100 rounded-full p-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- My Orders Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
                <svg class="w-6 h-6 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                My Orders
            </h3>

            @if($myOrders->count() > 0)
                <div class="space-y-4">
                    @foreach($myOrders as $order)
                        <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition duration-200">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h4 class="font-bold text-lg text-gray-800">{{ $order->item_name }}</h4>
                                    <p class="text-gray-600 text-sm mt-1">
                                        👤 {{ $order->user->name }}
                                    </p>
                                    <p class="text-gray-500 text-xs mt-1">
                                        {{ $order->created_at->diffForHumans() }}
                                    </p>
                                </div>
                                <div class="text-right">
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h4 class="text-xl font-semibold text-gray-600 mb-2">Belum ada order yang di-assign</h4>
                    <p class="text-gray-500">Silakan tunggu admin menugaskan pesanan</p>
                </div>
            @endif
        </div>

        <!-- View All Orders Button -->
        <div class="text-center">
            <a href="{{ route('kurir.orders.index') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-200">
                Lihat Semua Order Saya
            </a>
        </div>
    </div>
</body>
</html>