@extends('layouts.master')

@section('title','Abyta Florist - Katalog')

@section('content')
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
    <main class="grow p-4 md:p-6 lg:p-8">
      
      <!-- Header -->
      <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div class="flex flex-col gap-2">
          <h1 class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">
            Koleksi Kami
          </h1>
          <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">
            Rangkaian bunga modern dan jasa buket untuk setiap kesempatan.
          </p>
        </div>
      </div>

<!-- FORM FILTER -->
<form method="GET" action="{{ route('catalogue') }}">
  <div class="flex flex-col md:flex-row gap-4 mb-6 items-center">

    <!-- SEARCH -->
    <div class="flex items-center flex-grow">
      <label class="flex flex-col min-w-40 h-12 w-full">
        <div class="flex w-full flex-1 items-stretch rounded-full h-full">
          <div class="text-gray-500 dark:text-gray-400 flex bg-gray-100 dark:bg-gray-800 
                      items-center justify-center pl-4 rounded-l-full border-r-0">
            <span class="material-symbols-outlined">search</span>
          </div>
          <input name="search"
                 value="{{ request('search') }}"
                 class="form-input flex w-full min-w-0 flex-1 resize-none 
                        rounded-full text-gray-900 dark:text-white focus:outline-0 
                        focus:ring-2 focus:ring-primary/50 border-none bg-gray-100 
                        dark:bg-gray-800 h-full placeholder:text-gray-500 
                        dark:placeholder:text-gray-400 px-4 rounded-l-none border-l-0 
                        pl-2 text-base font-normal leading-normal"
                 placeholder="Cari produk..." />
        </div>
      </label>

      <!-- ICON REFRESH -->
      <a href="{{ route('catalogue') }}"
         class="ml-2 flex items-center justify-center w-12 h-12 rounded-full 
                bg-gray-200 hover:bg-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 
                text-gray-700 dark:text-gray-200 transition">
        <span class="material-symbols-outlined text-xl">refresh</span>
      </a>
    </div>

    <!-- FILTER WRAPPER -->
    <div class="flex gap-3 items-center flex-wrap">

      <!-- FILTER KATEGORI -->
      <div class="relative">
        <select name="category"
                class="appearance-none h-12 shrink-0 items-center justify-center gap-x-2 
                       rounded-full bg-gray-100 dark:bg-gray-800 pl-4 pr-10 
                       text-gray-900 dark:text-white text-sm font-medium leading-normal 
                       focus:outline-none focus:ring-2 focus:ring-primary/50">
          <option value="">Semua Kategori</option>
          <option value="Bingkai Kenangan" {{ request('category') == 'Bingkai Kenangan' ? 'selected' : '' }}>Bingkai Kenangan</option>
          <option value="Kotak Bunga" {{ request('category') == 'Kotak Bunga' ? 'selected' : '' }}>Kotak Bunga</option>
          <option value="Buket" {{ request('category') == 'Buket' ? 'selected' : '' }}>Buket</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 
                    text-gray-500 dark:text-gray-400">
          <span class="material-symbols-outlined">expand_more</span>
        </div>
      </div>

      <!-- FILTER HARGA -->
      <div class="relative">
        <select name="price"
                class="appearance-none h-12 shrink-0 items-center justify-center gap-x-2 
                       rounded-full bg-gray-100 dark:bg-gray-800 pl-4 pr-10 
                       text-gray-900 dark:text-white text-sm font-medium leading-normal 
                       focus:outline-none focus:ring-2 focus:ring-primary/50">
          <option value="">Semua Harga</option>
          <option value="low" {{ request('price') == 'low' ? 'selected' : '' }}>Termurah</option>
          <option value="high" {{ request('price') == 'high' ? 'selected' : '' }}>Termahal</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 
                    text-gray-500 dark:text-gray-400">
          <span class="material-symbols-outlined">expand_more</span>
        </div>
      </div>

      <!-- SUBMIT BUTTON -->
      <button type="submit"
              class="bg-primary text-white px-6 py-2 rounded-full hover:opacity-80 
                     transition font-semibold">
        Terapkan
      </button>

    </div>
  </div>
</form>


      <!-- GRID PRODUK -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">

        @foreach ($products as $product)
        <div class="bg-white dark:bg-gray-900 shadow rounded-xl overflow-hidden border 
                    dark:border-gray-700">
          
          <img src="{{ asset('storage/products/' . $product->image) }}" 
               class="w-full h-56 object-cover" alt="Produk">

          <div class="p-4">
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">
              {{ $product->name }}
            </h3>

            <p class="text-primary font-semibold mt-1">
              Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>

            <form method="POST" action="{{ route('cart.add', $product->id) }}">
              @csrf
              <button class="w-full mt-3 bg-green-600 hover:bg-green-700 text-white py-2 rounded-lg 
                             font-medium transition">
                Tambah ke Keranjang
              </button>
            </form>
          </div>

        </div>
        @endforeach

      </div>

    </main>
  </div>
</div>
@endsection
