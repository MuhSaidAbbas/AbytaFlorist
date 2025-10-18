@extends('master')

@section('title','Abyta Florist - Katalog')

@section('content')
<div class="px-4 md:px-10 lg:px-20 xl:px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[1200px] flex-1">
    <main class="flex-grow p-4 md:p-6 lg:p-8">
      <div class="flex flex-wrap justify-between items-center gap-4 mb-8">
        <div class="flex flex-col gap-2">
          <h1 class="text-gray-900 dark:text-white text-4xl font-black leading-tight tracking-[-0.033em]">Koleksi Kami</h1>
          <p class="text-gray-500 dark:text-gray-400 text-base font-normal leading-normal">Rangkaian bunga modern dan jasa buket untuk setiap kesempatan.</p>
        </div>
      </div>

      <div class="flex flex-col md:flex-row gap-4 mb-6">
        <div class="flex-grow">
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
{{-- contoh produk statis (tetap desainnya) - sekarang clickable ke halaman order --}}
<a href="{{ route('order') }}" class="group block transform hover:-translate-y-0.5 transition-transform" role="link" aria-label="Kotak Bunga Ketenangan — buka halaman pesan">
  <div class="flex flex-col gap-3 pb-3 rounded-lg overflow-hidden bg-background-light dark:bg-gray-800 shadow-md hover:shadow-xl transition-shadow duration-300">
    <div
      class="w-full bg-center bg-no-repeat aspect-square bg-cover"
      data-alt="The Serene Bloom Box"
      style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA5wx-AB08jMm6MXVsqxAJcOA-1Dnc7wzSlQGtEA44TFYuCQKWnKWcpqRfym8ZgJjy8zCJ9CPokkvEFH09GwpqS_1MMbtGu2szGMhS4ibCZcNqN2fcYrgyDWtOLnx8JCEIoJ8YOMZLxk4eVL1vUGE3A-pKdT4cuc5_oub7GTbaLdVIrNk_jnXuRjjovWVQYWjLZtgcEAmlhnQnOP1ncS_rdNylZ7fhL1TKS9tNWt5s9tr8Lv4fHDLTT3X6PfsNZg8dTM0JVsq2mPzY");'>
    </div>

    <div class="p-4 flex flex-col flex-grow">
      <p class="text-gray-900 dark:text-white text-lg font-bold leading-normal">Kotak Bunga Ketenangan</p>
      <p class="text-gray-500 dark:text-gray-400 text-sm font-normal leading-normal mt-1 flex-grow">Rangkaian bunga yang menenangkan di dalam kotak.</p>

      <div class="flex justify-between items-center mt-4">
        <p class="text-primary dark:text-soft-pink text-lg font-bold leading-normal">Rp750.000</p>
        <div class="flex items-center">
          <span class="material-symbols-outlined text-yellow-500 text-base">star</span>
          <span class="material-symbols-outlined text-yellow-500 text-base">star</span>
          <span class="material-symbols-outlined text-yellow-500 text-base">star</span>
          <span class="material-symbols-outlined text-yellow-500 text-base">star</span>
          <span class="material-symbols-outlined text-yellow-500 text-base">star_half</span>
        </div>
      </div>
    </div>
  </div>
</a>


        {{-- tambahkan produk lain sesuai template yang lo punya (tetap statis untuk sekarang) --}}
      </div>
    </main>
  </div>
</div>
@endsection
