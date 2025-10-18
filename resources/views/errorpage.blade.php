@extends('layouts.master')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<section class="text-center py-20">
    <h1 class="text-6xl font-bold text-primary mb-4">404</h1>
    <p class="text-lg mb-6">Oops! Halaman yang kamu cari tidak ditemukan.</p>
    <a href="{{ route('home') }}" class="bg-primary text-white px-6 py-3 rounded-full hover:bg-soft-pink transition">
        Kembali ke Beranda
    </a>
</section>
@endsection
