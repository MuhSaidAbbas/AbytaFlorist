@extends('layouts.master')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    <form method="POST" action="{{ route('login') }}" novalidate>
        @csrf

        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" class="w-full mb-3 p-2 border rounded">

        <div class="relative mb-3">
            <input
                type="password"
                name="password"
                id="password"
                placeholder="Password"
                class="w-full p-2 border rounded pr-12 focus:outline-none focus:ring-2 focus:ring-primary"
            >

            <button
                type="button"
                id="togglePassword"
                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-800"
                aria-label="Toggle password visibility"
            >
                <!-- eye -->
                <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12s3.75-7.5 9.75-7.5S21.75 12 21.75 12s-3.75 7.5-9.75 7.5S2.25 12 2.25 12z"/>
                    <circle cx="12" cy="12" r="3.25"/>
                </svg>

                <!-- eye-off -->
                <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 hidden"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 3l18 18M10.7 10.7A3 3 0 0012 15a3 3 0 002.3-4.3M6.5 6.5C4 8.6 2.25 12 2.25 12s3.75 7.5 9.75 7.5c2 0 3.8-.6 5.3-1.6"/>
                </svg>
            </button>
        </div>

        <button class="w-full bg-primary text-white py-2 rounded">
            Login
        </button>
    </form>
</div>

@if (session('login_error'))
<div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 text-center">

        <div class="flex justify-center mb-4">
            <div class="h-14 w-14 flex items-center justify-center rounded-full bg-red-100">
                <svg class="h-7 w-7 text-red-600" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>

        <h3 class="text-lg font-semibold mb-2 text-red-600">
            Login Gagal
        </h3>

        <p class="text-sm text-gray-600 mb-6">
            {{ session('login_error') }}
        </p>

        <button
            onclick="this.closest('.fixed').remove()"
            class="w-full rounded-lg bg-gray-200 py-2 text-gray-700 hover:bg-gray-300 transition">
            Tutup
        </button>

    </div>
</div>
@endif


<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');
    const eye = document.getElementById('icon-eye');
    const eyeOff = document.getElementById('icon-eye-off');

    toggle.addEventListener('click', () => {
        const isHidden = password.type === 'password';

        password.type = isHidden ? 'text' : 'password';
        eye.classList.toggle('hidden', isHidden);
        eyeOff.classList.toggle('hidden', !isHidden);
    });
</script>

@endsection
