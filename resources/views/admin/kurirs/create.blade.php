<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kurir - Admin Jastip Jember</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Tambah Kurir Baru</p>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Tambah Kurir Baru</h2>

        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-6 max-w-2xl mx-auto">
            <form method="POST" action="{{ route('admin.kurirs.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" name="password" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                    <p class="text-gray-500 text-sm mt-1">Minimal 8 karakter.</p>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-6 rounded-lg">
                        Simpan Kurir
                    </button>
                    <a href="{{ route('admin.kurirs.index') }}" class="ml-4 text-gray-600 hover:text-gray-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>