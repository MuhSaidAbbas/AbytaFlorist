@extends('layouts.admin-auth')

@section('title', 'Login Admin')

@section('content')
<div class="min-h-[60vh] flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-xl shadow p-8">
        <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input
                        type="email"
                        name="email"
                        class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary"
                        placeholder="Masukkan email Anda"
                        required
                    >
                </div>

                {{-- Password --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium mb-1">Password</label>

                    <div class="relative">
                        <input
                            type="password"
                            id="admin-password"
                            name="password"
                            class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary pr-12"
                            placeholder="••••••••"
                            required
                        >

                        <button
                            type="button"
                            onclick="togglePassword()"
                            class="absolute inset-y-0 right-3 flex items-center text-gray-500 hover:text-primary">
                            👁️
                        </button>
                    </div>
                </div>

                {{-- BUTTON LOGIN (HARUS DI LUAR) --}}
                <button
                    type="submit"
                    class="w-full bg-primary hover:bg-primary/90 text-white py-3 rounded-lg font-bold shadow-md transition">
                    Login
                </button>
            </form>

<script>
    function togglePassword() {
        const input = document.getElementById('admin-password');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>

@endsection
