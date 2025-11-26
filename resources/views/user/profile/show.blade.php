<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Jastip Jember</title>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14a7 7 0 01-7 7h14a7 7 0 01-7-7z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Profil Akun Anda</p>
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
        <!-- Judul Halaman -->
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Profil Saya</h2>

        <!-- Kartu Profil -->
        <div class="bg-white rounded-xl shadow-lg p-6 max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Kolom Kiri: Avatar & Nama -->
                <div class="md:col-span-1 flex flex-col items-center">
                    <div class="w-24 h-24 bg-gray-300 rounded-full flex items-center justify-center text-3xl font-bold text-gray-600 mb-4">
                        {{ substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">{{ auth()->user()->name }}</h3>
                    <p class="text-gray-600">{{ auth()->user()->email }}</p>
                </div>

                <!-- Kolom Kanan: Informasi Akun -->
                <div class="md:col-span-2">
                    <h4 class="text-lg font-semibold text-gray-800 mb-4">Informasi Akun</h4>
                    <div class="space-y-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nama Lengkap:</span>
                            <span class="font-medium">{{ $user->name }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Email:</span>
                            <span class="font-medium">{{ $user->email }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Nomor Telepon:</span>
                            <span class="font-medium">{{ $user->phone ?? 'Belum diisi' }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Role:</span>
                            <span class="font-medium">{{ ucfirst($user->role) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Dibuat pada:</span>
                            <span class="font-medium">{{ $user->created_at->format('d M Y H:i') }}</span>
                        </div>
                    </div>

                    <!-- Tombol Edit Profil & Kembali ke Dashboard -->
                    <div class="mt-6 flex justify-center space-x-4">
                        <a href="{{ route('user.profile.edit') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg">
                            Edit Profil
                        </a>
                        <a href="{{ route('user.dashboard') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg">
                            ← Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>