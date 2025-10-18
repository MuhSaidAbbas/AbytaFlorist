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
                        "primary": "#800000",
                        "background-light": "#FFFCFC",
                        "background-dark": "#211114",
                        "soft-pink": "#FFC0CB",
                        "text-light": "#1b0e10",
                        "text-dark": "#f8f6f6"
                    },
                    fontFamily: {
                        "display": ["Be Vietnam Pro", "sans-serif"]
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
    {{-- ✅ Navbar (master) --}}
    <header class="flex items-center justify-between whitespace-nowrap border-b border-solid border-soft-pink/50 dark:border-primary/30 px-4 md:px-10 py-4">
        <div class="flex items-center gap-4 text-text-light dark:text-text-dark">
            <div class="size-6 text-primary">
                <svg fill="none" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd"
                        d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475Z" />
                </svg>
            </div>
            <h1 class="text-xl font-bold tracking-[-0.015em]">Abyta Florist</h1>
        </div>

        {{-- Desktop nav --}}
        <nav class="hidden md:flex flex-1 justify-end gap-6 mobile-nav">
            <a class="text-sm font-medium hover:text-primary" href="{{ route('home') }}">Beranda</a>
            <a class="text-sm font-medium hover:text-primary" href="{{ route('about') }}">Tentang</a>
            <a class="text-sm font-medium hover:text-primary" href="{{ route('catalogue') }}">Katalog</a>
            <a class="text-sm font-medium hover:text-primary" href="{{ route('order') }}">Pesan</a>
            <a class="text-sm font-medium hover:text-primary" href="{{ route('contact') }}">Kontak</a>
        </nav>

        {{-- Mobile button --}}
        <div class="md:hidden flex items-center">
            <button class="mobile-menu-button p-2 rounded-md" aria-label="toggle menu">
                <span class="material-symbols-outlined">menu</span>
            </button>
        </div>
    </header>

    {{-- Mobile nav (hidden by default, shown when toggle) --}}
    <div class="md:hidden hidden mobile-nav-mobile border-b border-solid border-soft-pink/20 dark:border-primary/20">
        <div class="flex flex-col px-4 py-3 gap-2">
            <a class="py-2 block text-sm font-medium hover:text-primary" href="{{ route('home') }}">Beranda</a>
            <a class="py-2 block text-sm font-medium hover:text-primary" href="{{ route('about') }}">Tentang</a>
            <a class="py-2 block text-sm font-medium hover:text-primary" href="{{ route('catalogue') }}">Katalog</a>
            <a class="py-2 block text-sm font-medium hover:text-primary" href="{{ route('order') }}">Pesan</a>
            <a class="py-2 block text-sm font-medium hover:text-primary" href="{{ route('contact') }}">Kontak</a>
        </div>
    </div>

    {{-- ✅ Bagian konten dinamis --}}
    <main class="py-10 px-4">
        @yield('content')
    </main>

    {{-- ✅ Footer --}}
    <footer class="border-t border-soft-pink/50 dark:border-primary/30 px-4 md:px-10 py-6 text-center">
        <p class="text-sm font-medium">Jl Jeruk Purut, Cilandak Timur, Jakarta Selatan</p>
        <p class="text-xs text-text-light/70 dark:text-text-dark/70 mt-1">
            © 2024 Abyta Florist. Hak Cipta Dilindungi.
        </p>
    </footer>

    {{-- Mobile menu toggle script (master) --}}
    <script>
    document.addEventListener('DOMContentLoaded', function(){
      const btn = document.querySelector('.mobile-menu-button');
      const desktopNav = document.querySelector('.mobile-nav'); // md:flex one
      const mobileNav = document.querySelector('.mobile-nav-mobile'); // stacked mobile

      if (!btn) return;

      btn.addEventListener('click', function(){
        // toggle desktopNav for very small screens (makes it appear too)
        if(desktopNav) desktopNav.classList.toggle('hidden');
        if(mobileNav) mobileNav.classList.toggle('hidden');
      });

      // optional: hide mobile nav when a link clicked (small UX nicety)
      document.querySelectorAll('.mobile-nav-mobile a').forEach(a=>{
        a.addEventListener('click', ()=> {
          if(mobileNav) mobileNav.classList.add('hidden');
        });
      });
    });
    </script>
</body>
</html>
