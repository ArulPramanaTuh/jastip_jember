<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip Jember - Jasa Titip Terpercaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-purple-100 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-indigo-600 text-white rounded-full p-3">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip Jember</h1>
                        <p class="text-sm text-gray-600">Jasa Titip Terpercaya di Jember</p>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-4 py-16 text-center">
        <h1 class="text-5xl font-extrabold text-gray-800 mb-4">Jastip Jember</h1>
        <p class="text-xl text-gray-600 mb-8">Titip barang dengan aman, cepat, dan terpercaya di Jember.</p>

        <!-- Ganti 3 tombol jadi 1 tombol Login -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('login') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-semibold transition duration-200 w-full sm:w-auto">
                Masuk ke Akun
            </a>
        </div>

        <!-- Tambahkan opsi Register di bawah -->
        <div class="mt-4">
            <p class="text-gray-600">Belum punya akun? <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Daftar sekarang</a></p>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-12">Kenapa Pilih Jastip Jember?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 bg-indigo-50 rounded-xl">
                    <div class="bg-indigo-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Aman & Terpercaya</h3>
                    <p class="text-gray-600">Semua transaksi dan pengiriman dilacak secara real-time.</p>
                </div>
                <div class="text-center p-6 bg-green-50 rounded-xl">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Cepat & Efisien</h3>
                    <p class="text-gray-600">Kurir siap antar dalam waktu singkat.</p>
                </div>
                <div class="text-center p-6 bg-purple-50 rounded-xl">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Dukungan 24/7</h3>
                    <p class="text-gray-600">Tim kami siap membantu kapan saja.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="container mx-auto px-4 text-center">
            <p>&copy; 2025 Jastip Jember. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>