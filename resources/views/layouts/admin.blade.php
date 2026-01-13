<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel - Abyta Florist')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        abyta: {
                            dark: '#7A1F1F',
                            hover: '#8F2C2C',
                            soft: '#FDECEC'
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 min-h-screen flex text-gray-800">

{{-- SIDEBAR --}}
<aside class="w-64 bg-abyta-dark text-white flex flex-col shadow-lg">

    {{-- BRAND --}}
    <div class="px-6 py-5 text-xl font-bold border-b border-white/20 tracking-wide">
        Abyta Florist
        <p class="text-xs font-normal text-white/70">Admin Panel</p>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-3 py-5 space-y-1 text-sm">

        {{-- DASHBOARD --}}
        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
            📊 Dashboard
        </a>

        {{-- PRODUK --}}
        <a href="{{ route('admin.products.index') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
            ⚙️ Kelola Produk
        </a>

        <a href="{{ route('admin.products.create') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
            ➕ Tambah Produk
        </a>

        {{-- PESANAN --}}
        <a href="{{ route('admin.orders') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
            📦 Daftar Pesanan
        </a>

        <div class="border-t border-white/20 my-3"></div>

        {{-- BACK TO WEBSITE --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  bg-abyta-soft text-abyta-dark font-semibold
                  hover:bg-white transition">
            🌸 Kembali ke Website
        </a>

        {{-- LOGOUT --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit"
                class="w-full text-left flex items-center gap-2 px-4 py-2 rounded-lg
                       bg-red-600 hover:bg-red-700 transition font-semibold">
                🚪 Logout
            </button>
        </form>
    </nav>

    {{-- FOOTER --}}
    <div class="px-4 py-3 text-xs text-center text-white/70 border-t border-white/20">
        © 2025 Abyta Florist
    </div>
</aside>

{{-- CONTENT --}}
<main class="flex-1 p-6 overflow-y-auto">

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-4 bg-red-100 border border-red-300 text-red-800 px-4 py-3 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

</body>
</html>
