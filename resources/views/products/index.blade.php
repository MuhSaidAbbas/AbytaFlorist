@extends('layouts.admin')

@section('title', 'Kelola Produk')

@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-bold mb-2">Kelola Produk</h1>
    <p class="text-gray-600">Daftar seluruh produk Abyta Florist</p>
</div>

<a href="{{ route('products.create') }}"
   class="inline-block mb-6 bg-abyta-dark text-white px-4 py-2 rounded-lg hover:bg-abyta-hover transition">
    + Tambah Produk
</a>

@if($products->isEmpty())
    <p class="text-gray-600">Belum ada produk.</p>
@else
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="bg-white rounded-xl shadow p-4">
            <img src="{{ asset('storage/products/'.$product->image) }}"
                 class="w-full h-40 object-cover rounded-lg mb-3">

            <h3 class="font-semibold">{{ $product->name }}</h3>
            <p class="text-abyta-dark font-bold mb-3">
                Rp {{ number_format($product->price,0,',','.') }}
            </p>

            <div class="flex gap-2">
                <a href="{{ route('products.edit',$product->id) }}"
                   class="flex-1 bg-yellow-500 text-white py-2 rounded text-center hover:bg-yellow-600">
                    Edit
                </a>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="flex-1">
                    @csrf @method('DELETE')
                    <button class="w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endif
@endsection
