<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Alamat - Jastip Jember</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Kelola Alamat Anda</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium">{{ auth()->user()->name }}</span>
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
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Kelola Alamat</h2>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Daftar Alamat -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Daftar Alamat</h3>
            @if($user->addresses->count() > 0)
                <div class="space-y-4">
                    @foreach($user->addresses as $address)
                        <div class="border border-gray-200 rounded-lg p-4 flex justify-between items-start">
                            <div>
                                <p class="font-bold text-gray-800">{{ $address->label }}</p>
                                <p class="text-gray-600 mt-1">{{ $address->address }}</p>
                                @if($address->is_default)
                                    <span class="inline-block mt-2 px-2 py-1 bg-green-100 text-green-800 text-xs font-semibold rounded">
                                        Default
                                    </span>
                                @endif
                            </div>
                            <div class="text-right">
                                <form method="POST" action="{{ route('user.profile.addresses.set-default', $address->id) }}" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="text-blue-600 hover:text-blue-800">
                                        Jadikan Default
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('user.profile.addresses.destroy', $address->id) }}" class="inline ml-3">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">Belum ada alamat.</p>
            @endif
        </div>

        <!-- Form Tambah Alamat -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tambah Alamat Baru</h3>
            <form method="POST" action="{{ route('user.profile.addresses.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="label" class="block text-sm font-medium text-gray-700 mb-2">Label Alamat</label>
                    <input type="text" name="label" id="label" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Contoh: Rumah, Kantor, Sekolah">
                    @error('label')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="address" id="address" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            rows="3"
                            placeholder="Contoh: Jl. Raya Kediri No. 20, Kec. Sumberasri, Jember"></textarea>
                    @error('address')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="is_default" class="flex items-center">
                        <input type="checkbox" name="is_default" id="is_default" class="mr-2">
                        <span class="text-gray-700">Jadikan alamat default</span>
                    </label>
                </div>

                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                    Simpan Alamat
                </button>
                <a href="{{ route('user.profile.edit') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-8 rounded-lg transition duration-200">
                        Batal
                    </a>
            </form>
        </div>
    </div>
</body>
</html>