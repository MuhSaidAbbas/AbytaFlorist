<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Area User - Abyta Florist')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
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

{{-- SIDEBAR USER --}}
<aside class="w-64 bg-abyta-dark text-white flex flex-col shadow-lg">

    {{-- BRAND --}}
    <div class="px-6 py-5 text-xl font-bold border-b border-white/20 tracking-wide">
        Abyta Florist
        <p class="text-xs font-normal text-white/70">Area User</p>
    </div>

    {{-- MENU --}}
    <nav class="flex-1 px-3 py-5 space-y-1 text-sm">

        {{-- DASHBOARD --}}
        <a href="{{ route('user.dashboard') }}"
        class="flex items-center gap-2 px-4 py-2 rounded-lg hover:bg-abyta-hover transition">

            {{-- ICON DASHBOARD --}}
            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 text-white"
                fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 9.75L12 4.5l9 5.25v9A1.5 1.5 0 0119.5 20.25h-15A1.5 1.5 0 013 18.75v-9z" />
            </svg>

            <span>Dashboard</span>
        </a>

        {{-- PESANAN SAYA --}}
        <a href="#"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-white"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 6.75h7.5M8.25 12h7.5M8.25 17.25h7.5M3.75 6.75h.008v.008H3.75V6.75z
                            M3.75 12h.008v.008H3.75V12z
                            M3.75 17.25h.008v.008H3.75v-.008z" />
                </svg>
      
            <span>Pesanan Saya</span>
        </a>

        <div class="border-t border-white/20 my-3"></div>

        {{-- KEMBALI KE WEBSITE --}}
        <a href="{{ route('home') }}"
           class="flex items-center gap-2 px-4 py-2 rounded-lg
                  hover:bg-abyta-hover transition">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 text-white"
                    fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

            <span>Kembali ke Website</span>
        </a>

        {{-- LOGOUT --}}
        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit"
                class="w-full text-left flex items-center gap-2 px-4 py-2 rounded-lg
                       bg-red-600 hover:bg-red-700 transition font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-white"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15
                                M18 12l3-3m0 0l-3-3m3 3H9" />
                    </svg>
                Logout
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
