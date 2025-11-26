<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesanan #{{ $order->id }} - Kurir Jember</title>
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
            <h2 class="text-3xl font-bold text-gray-800">Detail Pesanan #{{ $order->id }}</h2>
            <a href="{{ route('kurir.orders.index') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                ← Kembali ke Daftar Pesanan
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Informasi Barang -->
            <div class="md:col-span-2 bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">Barang</h3>
                <p class="text-gray-600 mt-2"><strong>Nama:</strong> {{ $order->item_name }}</p>
                <p class="text-gray-600"><strong>Kuantitas:</strong> {{ $order->quantity ?? 1 }}</p>
                <p class="text-gray-600"><strong>Harga Satuan:</strong> Rp {{ number_format($order->price_per_unit, 0, ',', '.') }}</p>
                <p class="text-gray-600"><strong>Total Harga:</strong> Rp {{ number_format($order->total_price, 0, ',', '.') }}</p>

                <div class="mt-6">
                    <h3 class="text-xl font-semibold text-gray-800">Alamat Pengiriman</h3>
                    <p class="text-gray-600 mt-2"><strong>Penerima:</strong> {{ $order->recipient_name }}</p>
                    <p class="text-gray-600"><strong>Alamat:</strong> {{ $order->delivery_address }}</p>
                    <p class="text-gray-600"><strong>Kontak:</strong> {{ $order->recipient_phone }}</p>
                </div>
            </div>

            <!-- Alamat Pickup -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-semibold text-gray-800">Alamat Pickup</h3>
                <p class="text-gray-600 mt-2"><strong>Lokasi Pembelian:</strong> {{ $order->pickup_address }}</p>
                <p class="text-gray-600"><strong>Telepon Pemilik Barang:</strong> {{ $order->user->phone ?? '-' }}</p>
            </div>
        </div>

        <!-- Status -->
        <div class="mt-6 bg-white rounded-xl shadow-lg p-6">
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

        <!-- Update Status Form -->
        <div class="mt-6 bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800">Update Status Pesanan</h3>
            <form method="POST" action="{{ route('kurir.orders.update-status', $order->id) }}">
                @csrf
                <label class="block text-sm font-medium text-gray-700 mb-2">Status Baru:</label>
                <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-3" required>
                    <option value="">Pilih Status Baru</option>
                    @if($order->status == 'assigned')
                        <option value="picked_up">Diambil (Picked Up)</option>
                    @elseif($order->status == 'picked_up')
                        <option value="delivering">Sedang Dikirim (Delivering)</option>
                    @elseif($order->status == 'delivering')
                        <option value="completed">Selesai (Completed)</option>
                    @endif
                </select>
                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
                    Update Status
                </button>
            </form>
        </div>
    </div>
</body>
</html>