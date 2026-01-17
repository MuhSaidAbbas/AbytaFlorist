<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'User Area')</title>

    {{-- Tailwind / CSS --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- HEADER USER --}}
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <h1 class="text-lg font-bold text-gray-800">
                Area User
            </h1>
        </div>
    </header>

    {{-- CONTENT --}}
    <main class="max-w-7xl mx-auto px-6 py-6">
        @yield('content')
    </main>

</body>
</html>
