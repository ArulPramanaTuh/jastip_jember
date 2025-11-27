<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-50 to-indigo-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
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
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Profil Admin</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-700 hover:text-purple-600 font-medium">
                        Kembali ke Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto">
            <!-- Success Message -->
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Profile Card -->
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-purple-600 to-indigo-600 px-8 py-12 text-center">
                    <div class="inline-block mb-4">
                        @if($user->profile_photo_path)
                            <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Foto Profil" class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg">
                        @else
                            <div class="bg-white rounded-full p-4">
                                <svg class="w-20 h-20 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                    <h2 class="text-3xl font-bold text-white mb-2">{{ $user->name }}</h2>
                    <p class="text-purple-100 text-lg">Administrator</p>
                </div>

                <!-- Profile Info -->
                <div class="p-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi Profil</h3>
                    
                    <div class="space-y-6">
                        <!-- Nama -->
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nama Lengkap</label>
                            <p class="text-lg text-gray-800 font-semibold">{{ $user->name }}</p>
                        </div>

                        <!-- Email -->
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                            <p class="text-lg text-gray-800 font-semibold">{{ $user->email }}</p>
                        </div>

                        <!-- Telepon -->
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Nomor Telepon</label>
                            <p class="text-lg text-gray-800 font-semibold">{{ $user->phone ?? 'Belum diisi' }}</p>
                        </div>

                        <!-- Role -->
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Role</label>
                            <span class="inline-block bg-purple-100 text-purple-800 px-4 py-2 rounded-lg font-semibold">
                                Administrator
                            </span>
                        </div>

                        <!-- Tanggal Bergabung -->
                        <div class="border-b border-gray-200 pb-4">
                            <label class="block text-sm font-medium text-gray-600 mb-1">Bergabung Sejak</label>
                            <p class="text-lg text-gray-800 font-semibold">{{ $user->created_at->format('d F Y') }}</p>
                        </div>
                    </div>

                    <!-- Button Edit Profile -->
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('admin.profile.edit') }}" class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 hover:from-purple-700 hover:to-indigo-700 text-white font-bold py-3 px-6 rounded-lg text-center transition duration-200 flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Profil
                        </a>
                        <a href="{{ route('admin.dashboard') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg text-center transition duration-200">
                            Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>