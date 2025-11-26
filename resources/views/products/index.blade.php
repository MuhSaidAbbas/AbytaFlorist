@extends('layouts.master')

@section('content')
<div class="px-4 md:px-10 py-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Produk</h2>

    <a href="{{ route('products.create') }}"
       class="inline-block mb-6 bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary/90 transition">
        + Tambah Produk
    </a>

    {{-- Alert --}}
    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-300 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($products->isEmpty())
        <p class="text-gray-600">Belum ada produk.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
                <div class="bg-white dark:bg-background-dark rounded-xl shadow hover:shadow-lg transition p-4">
                    
                    {{-- Gambar --}}
                    <img src="{{ asset('storage/products/' . $product->image) }}"
                         class="w-full h-40 object-cover rounded-lg mb-4">

                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-primary font-bold mb-3">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <div class="flex gap-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                           class="flex-1 bg-yellow-500 text-white py-2 rounded-lg hover:bg-yellow-600 transition text-center">
                            Edit
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
