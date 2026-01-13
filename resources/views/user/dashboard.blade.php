@extends('layouts.user')

@section('title', 'Dashboard Saya')

@section('content')

    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold">Dashboard Saya</h1>
        <p class="text-sm text-gray-600">
            Selamat datang, <span class="font-semibold">{{ session('user_name') }}</span>
        </p>
    </div>

    {{-- STAT BOX --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Total Pesanan</p>
            <p class="text-3xl font-bold">
                {{ $totalOrders ?? 0 }}
            </p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pesanan Aktif</p>
            <p class="text-3xl font-bold text-blue-600">
                {{ $activeOrders ?? 0 }}
            </p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow">
            <p class="text-sm text-gray-500">Pesanan Selesai</p>
            <p class="text-3xl font-bold text-green-600">
                {{ $completedOrders ?? 0 }}
            </p>
        </div>

    </div>

    {{-- INFO BOX --}}
    <div class="bg-abyta-soft border border-abyta-dark/20 rounded-xl p-5">
        <p class="text-sm text-gray-700">
            💡 Anda dapat melihat detail dan status pesanan Anda melalui menu
            <span class="font-semibold">“Pesanan Saya”</span>.
        </p>
    </div>

@endsection
