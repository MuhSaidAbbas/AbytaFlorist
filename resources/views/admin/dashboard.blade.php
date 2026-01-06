@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Produk</p>
        <p class="text-3xl font-bold">{{ \App\Models\Product::count() }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Total Pesanan</p>
        <p class="text-3xl font-bold">{{ \App\Models\Order::count() }}</p>
    </div>

    <div class="bg-white p-5 rounded-xl shadow">
        <p class="text-sm text-gray-500">Status Sistem</p>
        <p class="text-green-600 font-semibold">Online</p>
    </div>

</div>
@endsection
