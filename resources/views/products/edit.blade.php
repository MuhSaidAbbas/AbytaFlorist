@extends('layouts.admin')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-4 shadow-md rounded-lg">

    <h2 class="text-2xl font-bold mb-4">Edit Produk</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text"
                   name="name"
                   class="w-full border rounded p-2"
                   value="{{ $product->name }}"
                   required>
        </div>

        <div>
            <label class="block font-medium">Harga</label>
            <input type="number"
                   name="price"
                   class="w-full border rounded p-2"
                   value="{{ $product->price }}"
                   required>
        </div>

        <div>
            <label class="block font-medium">Stok</label>
            <input type="number"
                   name="stock"
                   class="w-full border rounded p-2"
                   value="{{ $product->stock }}"
                   required>
        </div>

        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description"
                      class="w-full border rounded p-2">{{ $product->description }}</textarea>
        </div>

        <div>
            <label class="block font-medium">Kategori</label>
            <select name="category"
                    class="w-full border rounded p-2"
                    required>
                <option value="buket" {{ $product->category == 'buket' ? 'selected' : '' }}>Buket</option>
                <option value="bingkai" {{ $product->category == 'bingkai' ? 'selected' : '' }}>Bingkai Kenangan</option>
                <option value="kotak" {{ $product->category == 'kotak' ? 'selected' : '' }}>Kotak Bunga</option>
                <option value="lainnya" {{ $product->category == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>

        <div>
            <label class="block font-medium">Gambar Produk</label>

            @if ($product->image)
                <img src="{{ asset('storage/products/' . $product->image) }}"
                     class="h-32 mb-2 rounded">
            @endif

            <input type="file"
                   name="image"
                   class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded w-full">
            Update Produk
        </button>
    </form>
</div>
@endsection
