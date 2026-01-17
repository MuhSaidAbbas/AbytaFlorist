@extends('layouts.user')

@section('title', 'Dashboard Saya')

@section('content')

    {{-- PAGE HEADER --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-abyta-dark tracking-wide">
            Dashboard Saya
        </h1>
        <p class="text-sm text-gray-600 mt-1">
            Selamat datang kembali,
            <span class="font-semibold">
                {{ session('user_name') ?? auth()->user()->name ?? 'User' }}
            </span>
        </p>
    </div>

    {{-- STATISTICS --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        {{-- TOTAL PESANAN --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <p class="text-sm text-gray-500 mb-1">
                Total Pesanan
            </p>
            <p class="text-3xl font-bold text-abyta-dark">
                {{ $totalOrders ?? 0 }}
            </p>
        </div>

        {{-- PESANAN AKTIF --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <p class="text-sm text-gray-500 mb-1">
                Pesanan Aktif
            </p>
            <p class="text-3xl font-bold text-blue-600">
                {{ $activeOrders ?? 0 }}
            </p>
        </div>

        {{-- PESANAN SELESAI --}}
        <div class="bg-white p-6 rounded-xl shadow-md border border-gray-100">
            <p class="text-sm text-gray-500 mb-1">
                Pesanan Selesai
            </p>
            <p class="text-3xl font-bold text-green-600">
                {{ $completedOrders ?? 0 }}
            </p>
        </div>

    </div>

    {{-- INFO PANEL --}}
    <div class="bg-abyta-soft border border-abyta-dark/20 rounded-xl p-6">
        <p class="text-sm text-gray-700 leading-relaxed">
            💡 Anda dapat memantau status, detail, dan riwayat pesanan Anda melalui menu
            <span class="font-semibold text-abyta-dark">
                “Pesanan Saya”
            </span>.
            Pastikan data penerima dan alamat selalu benar agar pesanan berjalan lancar 🌸
        </p>
    </div>

@endsection
