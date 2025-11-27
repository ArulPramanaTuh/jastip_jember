<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jastip Jember - Jasa Titip Terpercaya</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }
        .gradient-text {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="bg-white font-sans">
    <!-- Navbar -->
    <nav class="bg-white shadow-sm fixed w-full top-0 z-50">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-3">
                    <div class="bg-gradient-to-br from-cyan-500 to-blue-600 text-white rounded-xl p-2.5 shadow-lg">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Jastip</h1>
                        <p class="text-xs text-gray-500">Deliver</p>
                    </div>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#services" class="text-gray-600 hover:text-cyan-600 transition">Layanan</a>
                    <a href="#features" class="text-gray-600 hover:text-cyan-600 transition">Fitur</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6 bg-gradient-to-br from-cyan-50 via-blue-50 to-white">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="slide-in-left">
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Jasa titip 
                        <span class="gradient-text">makanan & minuman</span> terpercaya di Jember
                    </h1>
                    <div class="space-y-3 mb-8">
                        <div class="flex items-start space-x-3">
                            <span class="text-cyan-600 font-bold text-xl">1</span>
                            <p class="text-gray-600 text-lg">Pemesanan mudah & cepat</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-cyan-600 font-bold text-xl">2</span>
                            <p class="text-gray-600 text-lg">Jangkauan se-Jember</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-cyan-600 font-bold text-xl">3</span>
                            <p class="text-gray-600 text-lg">Customer Support 24/7</p>
                        </div>
                    </div>
                    <a href="{{ route('register') }}" class="inline-block bg-cyan-500 hover:bg-cyan-600 text-white px-8 py-4 rounded-lg font-semibold text-lg transition shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        Mulai Sekarang
                    </a>
                </div>

                <!-- Right Illustration -->
                <div class="relative float-animation">
                    <svg viewBox="0 0 400 400" class="w-full max-w-md mx-auto">
                        <!-- Delivery Scooter Illustration -->
                        <circle cx="200" cy="200" r="150" fill="#e0f2fe" opacity="0.3"/>
                        
                        <!-- Scooter Body -->
                        <ellipse cx="200" cy="240" rx="80" ry="60" fill="#06b6d4"/>
                        <rect x="160" y="200" width="80" height="40" rx="10" fill="#0891b2"/>
                        
                        <!-- Wheels -->
                        <circle cx="160" cy="270" r="25" fill="#1e293b"/>
                        <circle cx="160" cy="270" r="15" fill="#475569"/>
                        <circle cx="240" cy="270" r="25" fill="#1e293b"/>
                        <circle cx="240" cy="270" r="15" fill="#475569"/>
                        
                        <!-- Handlebar -->
                        <line x1="170" y1="200" x2="150" y2="180" stroke="#0891b2" stroke-width="6" stroke-linecap="round"/>
                        <circle cx="145" cy="175" r="8" fill="#0e7490"/>
                        
                        <!-- Delivery Box -->
                        <rect x="210" y="210" width="50" height="40" rx="5" fill="#0e7490"/>
                        <rect x="215" y="215" width="40" height="30" rx="3" fill="#67e8f9"/>
                        
                        <!-- Headlight -->
                        <path d="M 165 205 L 155 195 L 145 200 Z" fill="#fef08a"/>
                        <circle cx="150" cy="198" r="5" fill="#fde047" opacity="0.6"/>
                        
                        <!-- Rider -->
                        <circle cx="190" cy="170" r="20" fill="#164e63"/>
                        <ellipse cx="190" cy="195" rx="18" ry="25" fill="#0e7490"/>
                        
                        <!-- Helmet -->
                        <path d="M 175 165 Q 190 150 205 165" fill="#06b6d4"/>
                        <circle cx="195" cy="168" r="3" fill="#334155"/>
                        
                        <!-- Package Icon on Box -->
                        <path d="M 230 225 L 240 220 L 250 225 L 240 230 Z" fill="#0891b2" stroke="#164e63" stroke-width="1"/>
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Titip barang dengan mudah</h2>
                    <p class="text-gray-600 text-lg mb-8 leading-relaxed">
                        Kami mempermudah pengiriman makanan, minuman, dan barang Anda di seluruh Jember. Dengan kurir terpercaya dan sistem tracking real-time, pesanan Anda dijamin aman sampai tujuan.
                    </p>
                    <button class="border-2 border-cyan-500 text-cyan-600 px-6 py-3 rounded-lg font-medium hover:bg-cyan-50 transition">
                        Selengkapnya
                    </button>
                </div>

                <!-- Right Features -->
                <div class="space-y-8">
                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Pemesanan mudah, berbagai layanan</h3>
                        <p class="text-gray-600">Pesan makanan favorit, titip belanja, atau kirim barang dengan mudah melalui platform kami. Semua dalam satu aplikasi yang user-friendly.</p>
                    </div>
                    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Kelola semua pesanan di satu tempat</h3>
                        <p class="text-gray-600">Dashboard yang mudah digunakan membantu Anda melacak status pesanan secara real-time. Transparansi penuh dari awal hingga akhir pengiriman.</p>
                    </div>
                    <div class="bg-gradient-to-br from-cyan-50 to-blue-50 p-6 rounded-xl shadow-sm hover:shadow-md transition">
                        <h3 class="text-xl font-bold text-gray-800 mb-3">Tracking yang jelas dan akurat</h3>
                        <p class="text-gray-600">Pantau posisi kurir dan estimasi waktu tiba dengan sistem tracking kami yang canggih. Tidak ada lagi kebingungan tentang status pesanan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center text-gray-900 mb-4">Kenapa Pilih Jastip Jember?</h2>
            <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Layanan terbaik untuk kebutuhan pengiriman makanan, minuman, dan barang Anda di Jember</p>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-cyan-100 to-cyan-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-cyan-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 6a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Aman & Terpercaya</h3>
                    <p class="text-gray-600">Semua transaksi dan pengiriman dilacak secara real-time untuk keamanan maksimal.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-blue-100 to-blue-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Cepat & Efisien</h3>
                    <p class="text-gray-600">Kurir profesional siap mengantar pesanan Anda dalam waktu singkat.</p>
                </div>

                <div class="bg-white p-8 rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-purple-100 to-purple-200 w-16 h-16 rounded-2xl flex items-center justify-center mb-6">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-3">Dukungan 24/7</h3>
                    <p class="text-gray-600">Tim customer service kami siap membantu Anda kapan saja.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-cyan-500 to-blue-600">
        <div class="container mx-auto px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <h2 class="text-4xl font-bold text-white mb-6">Siap pesan sekarang?</h2>
                <p class="text-cyan-100 text-lg mb-8">Buat akun untuk mulai memesan. Hanya butuh beberapa langkah mudah.</p>
                <a href="{{ route('register') }}" class="inline-block bg-white text-cyan-600 px-10 py-4 rounded-lg font-bold text-lg hover:bg-gray-50 transition shadow-xl transform hover:scale-105">
                    Buat Akun Sekarang
                </a>
            </div>
        </div>
    </section>

    <!-- Footer
    <footer id="contact" class="bg-gray-900 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg font-bold mb-4">Tentang Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-cyan-400 transition">Visi & Misi</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Keamanan</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Testimoni</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-cyan-400 transition">Jastip Makanan</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Jastip Minuman</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Jastip Barang</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Bantuan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-cyan-400 transition">FAQ</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Cara Pesan</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-bold mb-4">Ikuti Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-cyan-400 transition">Facebook</a></li>
                        <li><a href="https://www.instagram.com/arulprmana11?igsh=MW5yZWIxYnRibW42" class="hover:text-cyan-400 transition">Instagram</a></li>
                        <li><a href="#" class="hover:text-cyan-400 transition">WhatsApp</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2025 Jastip Jember. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-cyan-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-cyan-400 transition">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer> -->

    <script>
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>