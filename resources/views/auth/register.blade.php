<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Jastip Jember</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        .bg-pattern {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        }
        .card-shadow {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .btn-primary {
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            color: white;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #4338ca, #6d28d9);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        }
        .icon-courier {
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            backdrop-filter: blur(10px);
        }
        .icon-courier svg {
            width: 50px;
            height: 50px;
            fill: #ffffff;
        }
        .form-footer a {
            color: #6366f1;
            text-decoration: none;
        }
        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="bg-pattern min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md bg-white rounded-2xl card-shadow p-8 text-center">
        
        <!-- Ikon Kurir -->
        <div class="icon-courier">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M16 11H8v6h8v-6zm-2 2h-4v2h4v-2z"/>
                <path d="M18 11H6V9c0-1.1.9-2 2-2h8c1.1 0 2 .9 2 2v2zm-8-4H6c-1.1 0-2 .9-2 2v2h16V9c0-1.1-.9-2-2-2h-8z"/>
                <path d="M18 17H6v-2h12v2z"/>
                <path d="M18 15H6v-2h12v2z"/>
                <path d="M18 13H6v-2h12v2z"/>
                <path d="M18 11H6v-2h12v2z"/>
                <path d="M18 9H6v-2h12v2z"/>
                <path d="M18 7H6v-2h12v2z"/>
                <path d="M18 5H6v-2h12v2z"/>
                <path d="M18 3H6v-2h12v2z"/>
            </svg>
        </div>

        <!-- Judul -->
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Daftar Akun Jastip Jember</h1>
        <p class="text-gray-600 mb-8">Titip barang dengan aman, cepat, dan terpercaya di Jember.</p>

        <!-- Form Register -->
        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="text-left">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    placeholder="Masukkan nama lengkap kamu"
                    value="{{ old('name') }}"
                >
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="text-left">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    required 
                    class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                    placeholder="Masukkan email kamu"
                    value="{{ old('email') }}"
                >
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="text-left">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        placeholder="Masukkan password kamu"
                    >
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <i id="eyeIcon" class="fas fa-eye-slash"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="text-left">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <input 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation" 
                        required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                        placeholder="Ulangi password kamu"
                    >
                    <button type="button" onclick="togglePasswordConfirm()" class="absolute inset-y-0 right-3 flex items-center text-gray-500">
                        <i id="eyeIconConfirm" class="fas fa-eye-slash"></i>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Register -->
            <button type="submit" class="w-full btn-primary py-3 px-4 rounded-xl font-semibold text-lg shadow-md">
                Daftar Sekarang
            </button>
        </form>

        <!-- Footer -->
        <div class="mt-8 text-sm text-gray-600">
            Sudah punya akun? 
            <a href="{{ route('login') }}" class="font-medium hover:text-indigo-500">Masuk ke Akun</a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }

        function togglePasswordConfirm() {
            const input = document.getElementById('password_confirmation');
            const icon = document.getElementById('eyeIconConfirm');
            
            if (input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            } else {
                input.type = "password";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>
</html>