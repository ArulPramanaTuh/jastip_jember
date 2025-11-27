<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pesanan Baru - Jastip Jember</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Jasa Titip Terpercaya</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                    <a href="{{ route('user.profile.show') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition duration-200">
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
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Buat Pesanan Baru</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-6">
            <form method="POST" action="{{ route('user.orders.store') }}">
                @csrf

                <!-- Item Name -->
                <div class="mb-6">
                    <label for="item_name" class="block text-sm font-medium text-gray-700 mb-2">Nama Barang</label>
                    <input
                        type="text"
                        id="item_name"
                        name="item_name"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Baju, Sepatu, Makanan, dll"
                        value="{{ old('item_name') }}"
                    >
                    @error('item_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Purchase Location -->
                <div class="mb-6">
                    <label for="purchase_location" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Pembelian</label>
                    <input
                        type="text"
                        id="purchase_location"
                        name="purchase_location"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Jl. Hayam Wuruk No. 10, Jember"
                        value="{{ old('purchase_location') }}"
                    >
                    @error('purchase_location')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pilih Alamat -->
                <div class="mb-6">
                    <label for="address_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Alamat Pengiriman</label>
                    @if($user->addresses->count() > 0)
                        <select
                            name="address_id"
                            id="address_id"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        >
                            <option value="">-- Pilih Alamat --</option>
                            @foreach($user->addresses as $address)
                                <option value="{{ $address->id }}" {{ old('address_id') == $address->id ? 'selected' : '' }}>
                                    {{ $address->label }}: {{ Str::limit($address->address, 50) }}
                                </option>
                            @endforeach
                        </select>
                    @else
                        <p class="text-gray-600">Kamu belum punya alamat tersimpan.</p>
                        <a href="{{ route('user.profile.edit') }}" class="text-indigo-600 hover:underline">Tambah Alamat Baru</a>
                    @endif
                    @error('address_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Estimated Price -->
                <div class="mb-6">
                    <label for="estimated_price" class="block text-sm font-medium text-gray-700 mb-2">Estimasi Harga Barang (Rp)</label>
                    <input
                        type="number"
                        id="estimated_price"
                        name="estimated_price"
                        required
                        min="0"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: 100000"
                        value="{{ old('estimated_price') }}"
                    >
                    @error('estimated_price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-between">
                    <a href="{{ route('user.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg">
                        ← Kembali ke Dashboard
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-8 rounded-lg transition duration-200">
                        Buat Pesanan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>