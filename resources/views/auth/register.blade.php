@extends('layouts.master')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <input type="text" name="name" placeholder="Nama"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password_confirmation"
            placeholder="Konfirmasi Password"
            class="w-full mb-3 p-2 border rounded" required>

        <button class="w-full bg-primary text-white py-2 rounded">
            Register
        </button>
    </form>
</div>
@endsection
