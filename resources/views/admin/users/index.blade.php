<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User - Admin Jastip Jember</title>
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
                        <p class="text-sm text-gray-600">Kelola User</p>
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
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Daftar User</h2>

        @if($users->count() > 0)
            <div class="overflow-x-auto bg-white rounded-xl shadow-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Dibuat</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right">
                                    <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin hapus user ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                @if($user->is_active)
                                    <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-orange-600 hover:text-orange-800">
                                            Nonaktifkan
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}" class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-green-600 hover:text-green-800">
                                            Aktifkan
                                        </button>
                                    </form>
                                @endif
                                <!-- Tombol Hapus tetap ada -->
                                <form method="POST" action="{{ route('admin.users.delete', $user->id) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-3">Hapus</button>
                                </form>
                            </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $users->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-600">Belum ada user.</p>
            </div>
        @endif
    </div>
</body>
</html>