<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', 'Abyta Florist')</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700&display=swap" rel="stylesheet"/>

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#800000",
                        "background-light": "#FFFCFC",
                        "background-dark": "#211114",
                        "soft-pink": "#FFC0CB",
                        "text-light": "#1b0e10",
                        "text-dark": "#f8f6f6"
                    },
                    fontFamily: {
                        display: ["Be Vietnam Pro", "sans-serif"]
                    },
                },
            },
        }
    </script>

    <style>
        body { font-family: 'Be Vietnam Pro', sans-serif; }
    </style>
</head>



<body class="bg-background-light dark:bg-background-dark text-text-light dark:text-text-dark">

<header class="flex items-center justify-between border-b border-soft-pink/50 px-4 md:px-10 py-4">
    <div class="flex items-center gap-4">
        <h1 class="text-xl font-bold">Abyta Florist</h1>
    </div>

    {{-- Desktop nav --}}
    <nav class="hidden md:flex flex-1 justify-end gap-6">
        <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
        <a href="{{ route('about') }}" class="hover:text-primary">Tentang</a>
        <a href="{{ route('catalogue') }}" class="hover:text-primary">Katalog</a>
        <a href="{{ route('contact') }}" class="hover:text-primary">Kontak</a>

        {{-- AUTH SECTION --}}
        @auth
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}"
                   class="px-4 py-2 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition font-semibold">
                    Admin Dashboard
                </a>
            @else
                <span class="font-semibold text-primary">
                    Halo, {{ auth()->user()->name }}
                </span>
            @endif

            <form method="POST"
                action="{{ route('logout') }}"
                onsubmit="return confirmLogout();"
                class="inline">
                @csrf
                <button
                    type="submit"
                    class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition font-semibold">
                    Logout
                </button>
            </form>

        @endauth

        @guest
            <a href="{{ route('login') }}"
               class="px-4 py-2 rounded-lg border border-primary text-primary hover:bg-primary hover:text-white transition font-semibold">
                Login
            </a>

            <a href="{{ route('register') }}"
               class="px-4 py-2 rounded-lg bg-primary text-white hover:bg-primary/90 transition font-semibold">
                Register
            </a>
        @endguest

        {{-- CART ICON --}}
        @php
            $sessionKey = session('cart_session_key');
            $cart = $sessionKey
                ? \App\Models\Cart::where('session_key', $sessionKey)->with('items')->first()
                : null;
            $cartCount = $cart ? $cart->items->sum('quantity') : 0;
        @endphp

        <a href="{{ route('cart.view') }}" class="relative flex items-center hover:text-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M2.25 3h1.386c.51 0 .955.343 1.09.836l.383 1.379
                      m0 0L6.75 14.25h10.5l1.64-8.235
                      a1.125 1.125 0 00-1.105-1.365H4.125m.984 2.25H18"/>
            </svg>

            <span class="absolute -top-2 -right-3 bg-pink-600 text-white text-xs rounded-full px-1">
                {{ $cartCount }}
            </span>
        </a>
    </nav>

    {{-- Mobile --}}
    <button class="md:hidden mobile-menu-button">
        <span class="material-symbols-outlined">menu</span>
    </button>
</header>

{{-- Mobile menu --}}
<div class="md:hidden hidden mobile-nav-mobile border-b px-4 py-3">
    <a href="{{ route('home') }}" class="block py-2">Beranda</a>
    <a href="{{ route('about') }}" class="block py-2">Tentang</a>
    <a href="{{ route('catalogue') }}" class="block py-2">Katalog</a>
    <a href="{{ route('contact') }}" class="block py-2">Kontak</a>

    @auth
    <form method="POST"
        action="{{ route('logout') }}"
        onsubmit="return confirmLogout();"
        class="inline">
        @csrf
        <button
            type="submit"
            class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition font-semibold">
            Logout
        </button>
    </form>

    @else
        <a href="{{ route('login') }}" class="block py-2 text-primary font-semibold">Login</a>
        <a href="{{ route('register') }}" class="block py-2 text-primary font-semibold">Register</a>
    @endauth

    <a href="{{ route('cart.view') }}" class="block py-2 font-semibold text-primary">
        Keranjang ({{ $cartCount }})
    </a>
</div>

<main class="py-10 px-4">
    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @yield('content')
</main>

<footer class="border-t border-soft-pink/50 dark:border-primary/30 px-4 md:px-10 py-6 text-center">
    <p class="text-sm font-medium">Jl Jeruk Purut, Cilandak Timur, Jakarta Selatan</p>
    <p class="text-xs text-text-light/70 dark:text-text-dark/70 mt-1">
        © 2025 Abyta Florist. Hak Cipta Dilindungi.
    </p>
</footer>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.querySelector('.mobile-menu-button');
    const nav = document.querySelector('.mobile-nav-mobile');
    if(btn) btn.addEventListener('click', () => nav.classList.toggle('hidden'));
});
</script>

<script>
function confirmLogout() {
    return confirm('Apakah Anda yakin ingin keluar dari akun?');
}
</script>

</body>
</html>
