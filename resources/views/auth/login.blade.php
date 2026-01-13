@extends('layouts.master')

@section('content')
<div class="max-w-md mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <input type="email" name="email" placeholder="Email"
            class="w-full mb-3 p-2 border rounded" required>

        <input type="password" name="password" placeholder="Password"
            class="w-full mb-3 p-2 border rounded" required>

        <button class="w-full bg-primary text-white py-2 rounded">
            Login
        </button>
    </form>
</div>
@endsection
