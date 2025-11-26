@extends('layouts.master')

@section('content')
<div class="max-w-2xl mx-auto bg-white dark:bg-background-dark p-6 mt-10 shadow-md rounded-xl">

    <h1 class="text-2xl font-bold mb-4 text-center">Admin Panel – Abyta Florist</h1>
    <p class="text-center text-gray-600 dark:text-gray-300 mb-6">
        Halaman rahasia untuk mengelola produk
    </p>

    <div class="space-y-4">

        {{-- Kelola Produk --}}
        <a href="{{ route('products.index') }}"
           class="block bg-primary text-white px-4 py-3 rounded-lg text-center font-semibold hover:bg-primary/80 transition">
            ⚙️ Kelola Produk (CRUD)
        </a>

        {{-- Tambah Produk --}}
        <a href="{{ route('products.create') }}"
           class="block bg-green-600 text-white px-4 py-3 rounded-lg text-center font-semibold hover:bg-green-700 transition">
            ➕ Tambah Produk Baru
        </a>

        {{-- Lihat Website --}}
        <a href="{{ route('home') }}"
           class="block bg-gray-200 dark:bg-gray-700 dark:text-white px-4 py-3 rounded-lg text-center font-semibold hover:bg-gray-300 dark:hover:bg-gray-600 transition">
            🌸 Kembali ke Website
        </a>
    </div>

</div>
@endsection
