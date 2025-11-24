@extends('layouts.master')

@section('title','Abyta Florist - Katalog')

@section('content')
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
    <main class="grow p-4 md:p-6 lg:p-8">
      <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div class="flex flex-col gap-2">
          <h1 class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Koleksi Kami</h1>
          <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">Rangkaian bunga modern dan jasa buket untuk setiap kesempatan.</p>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="grow">
          <label class="flex flex-col min-w-40 h-12 w-full">
            <div class="flex w-full flex-1 items-stretch rounded-full h-full">
              <div class="text-gray-500 dark:text-gray-400 flex bg-gray-100 dark:bg-gray-800 items-center justify-center pl-4 rounded-l-full border-r-0">
                <span class="material-symbols-outlined">search</span>
              </div>
              <input class="form-input flex w-full min-w-0 flex-1 resize-none overflow-hidden rounded-full text-gray-900 dark:text-white focus:outline-0 focus:ring-2 focus:ring-primary/50 border-none bg-gray-100 dark:bg-gray-800 h-full placeholder:text-gray-500 dark:placeholder:text-gray-400 px-4 rounded-l-none border-l-0 pl-2 text-base font-normal leading-normal" placeholder="Cari produk..." value=""/>
            </div>
          </label>
        </div>
        
        <div class="flex gap-3 items-center flex-wrap">
          <div class="relative">
            <select class="appearance-none h-12 shrink-0 items-center justify-center gap-x-2 rounded-full bg-gray-100 dark:bg-gray-800 pl-4 pr-10 text-gray-900 dark:text-white text-sm font-medium leading-normal focus:outline-none focus:ring-2 focus:ring-primary/50">
              <option>Semua Kategori</option>
              <option>Bingkai Kenangan</option>
              <option>Kotak Bunga</option>
              <option>Buket</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400">
              <span class="material-symbols-outlined">expand_more</span>
            </div>
          </div>

          <div class="relative">
            <select class="appearance-none h-12 shrink-0 items-center justify-center gap-x-2 rounded-full bg-gray-100 dark:bg-gray-800 pl-4 pr-10 text-gray-900 dark:text-white text-sm font-medium leading-normal focus:outline-none focus:ring-2 focus:ring-primary/50">
              <option>Semua Harga</option>
              <option>Rp0 - Rp500.000</option>
              <option>Rp500.000 - Rp1.000.000</option>
              <option>Rp1.000.000+</option>
            </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 dark:text-gray-400">
              <span class="material-symbols-outlined">expand_more</span>
            </div>
          </div>
        </div>
      </div>
      
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div class="container py-4">
            <h2 class="mb-4">Katalog Produk</h2>
        
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <img src="{{ asset('storage/products/' . $product->image) }}" 
                                 class="card-img-top" alt="Produk">
        
                            <div class="card-body">
                                <h5>{{ $product->name }}</h5>
                                <p class="text-muted">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        
                                <button class="btn btn-success btn-sm">Tambah ke Keranjang</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        
        </div>
      </main>
  </div>
</div>
@endsection
