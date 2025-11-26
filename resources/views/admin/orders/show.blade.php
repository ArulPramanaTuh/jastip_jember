<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }} - Admin Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-50 to-blue-100 min-h-screen">
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
                        <p class="text-sm text-gray-600">Admin Dashboard</p>
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
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h2>
            <a href="{{ route('admin.orders.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200">
                ← Kembali
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Detail Pesanan -->
            <div class="lg:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Informasi Pesanan</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Nama Barang:</span>
                        <span class="font-semibold text-gray-800">{{ $order->item_name }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Lokasi Pembelian:</span>
                        <span class="font-semibold text-gray-800 text-right max-w-xs">{{ $order->pickup_address }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Alamat Pengiriman:</span>
                        <span class="font-semibold text-gray-800 text-right max-w-xs">{{ $order->delivery_address }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Estimasi Harga Barang:</span>
                        <span class="font-semibold text-gray-800">Rp {{ number_format($order->item_price ?? $order->estimated_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Biaya Pengiriman:</span>
                        <span class="font-semibold text-gray-800">Rp {{ number_format($order->shipping_cost, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600 font-bold">Total Harga:</span>
                        <span class="font-bold text-blue-600 text-xl">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Catatan:</span>
                        <span class="font-semibold text-gray-800">{{ $order->notes ?? '-' }}</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="text-gray-600">Tanggal Pesan:</span>
                        <span class="font-semibold text-gray-800">{{ $order->created_at->format('d M Y H:i') }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Status:</span>
                        <span class="px-3 py-1 rounded-full text-sm font-semibold
                            @if($order->status == 'completed') bg-green-100 text-green-800
                            @elseif($order->status == 'cancelled') bg-red-100 text-red-800
                            @elseif($order->status == 'assigned') bg-blue-100 text-blue-800
                            @elseif($order->status == 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status == 'picked_up') bg-indigo-100 text-indigo-800
                            @elseif($order->status == 'delivering') bg-cyan-100 text-cyan-800
                            @else bg-gray-100 text-gray-800
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Sidebar: User, Kurir, Actions -->
            <div class="space-y-6">
                <!-- Info User -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Info Pemesan</h3>
                    <div class="space-y-3">
                        <div>
                            <span class="text-gray-600 text-sm">Nama:</span>
                            <p class="font-semibold text-gray-800">{{ $order->user->name }}</p>
                        </div>
                        <div>
                            <span class="text-gray-600 text-sm">Email:</span>
                            <p class="font-semibold text-gray-800">{{ $order->user->email }}</p>
                        </div>
                        <div>
                            <span class="text-gray-600 text-sm">Telepon:</span>
                            <p class="font-semibold text-gray-800">{{ $order->user->phone ?? '-' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Info Kurir -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Info Kurir</h3>
                    @if($order->kurir)
                        <div class="space-y-3">
                            <div>
                                <span class="text-gray-600 text-sm">Nama:</span>
                                <p class="font-semibold text-gray-800">{{ $order->kurir->name }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Email:</span>
                                <p class="font-semibold text-gray-800">{{ $order->kurir->email }}</p>
                            </div>
                            <div>
                                <span class="text-gray-600 text-sm">Telepon:</span>
                                <p class="font-semibold text-gray-800">{{ $order->kurir->phone ?? '-' }}</p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500 mb-4">Belum ada kurir yang di-assign</p>
                        
                        <!-- Form Assign Kurir -->
                        <form method="POST" action="{{ route('admin.orders.assign', $order->id) }}" class="mt-4">
                            @csrf
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Kurir:</label>
                            <select name="kurir_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3" required>
                                <option value="">-- Pilih Kurir --</option>
                                @foreach($kurirs as $kurir)
                                    <option value="{{ $kurir->id }}">{{ $kurir->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                                Assign Kurir
                            </button>
                        </form>
                    @endif
                </div>

                <!-- Update Status -->
                <!-- <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Update Status</h3>
                    <form method="POST" action="{{ route('admin.orders.update-status', $order->id) }}">
                        @csrf
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status Baru:</label>
                        <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3" required>
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="assigned" {{ $order->status == 'assigned' ? 'selected' : '' }}>Assigned</option>
                            <option value="picked_up" {{ $order->status == 'picked_up' ? 'selected' : '' }}>Picked Up</option>
                            <option value="delivering" {{ $order->status == 'delivering' ? 'selected' : '' }}>Delivering</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                            Update Status
                        </button>
                    </form>
                </div> -->
            </div>
        </div>
    </div>
</body>
</html>