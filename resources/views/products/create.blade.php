@extends('layouts.master')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 mt-10 shadow-md rounded-lg">

    <h2 class="text-2xl font-bold mb-4">Tambah Produk Baru</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc ml-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block font-medium">Nama Produk</label>
            <input type="text" name="name" class="w-full border rounded p-2"
                   placeholder="Contoh: Buket Mawar" required>
        </div>

        <div>
            <label class="block font-medium">Harga</label>
            <input type="number" name="price" class="w-full border rounded p-2"
                   placeholder="Contoh: 25000" required>
        </div>

        <div>
            <label class="block font-medium">Deskripsi</label>
            <textarea name="description" class="w-full border rounded p-2"
                      placeholder="Deskripsi produk (opsional)"></textarea>
        </div>

        <div>
            <label class="block font-medium">Gambar Produk</label>
            <input type="file" name="image" class="w-full border rounded p-2" required>
        </div>

        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded w-full">
            Simpan Produk
        </button>

    </form>
</div>
@endsection
