@extends('layouts.master')

@section('title','Abyta Florist')

@section('content')
<div class="relative flex h-auto min-h-[60vh] w-full flex-col group/design-root overflow-x-hidden">
  <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
      <main class="flex-1">
        <div class="@container mt-5">
          <div class="p-0 @[480px]:p-4">
            <div
              class="flex min-h-[520px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 rounded-lg items-center justify-center p-4"
              style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuALeu1DlsCEpBOXV_VttWuir6QP0EvJR5q7Kkrtm6SiQhqevPtV30bhDcT-yZWVOmjC8G1y2tQU_9VtApC-f5R8RintBlWqZfCs-KQcIFbLFSkE-ELiA_dFwjUSqpLvHEwQHAj4kW63EkFuZcIJngltMhq0cNOPFga-SFLNRFtkGAJxvqUfK8PAbQiDT-Nze4OLho2dqFYrcyYSPEfUuE7aVvtqec2A2UQHZX7fq6DT1dtoNjrQ-iASt3CD5ysvRO8EfbMa569zrqo");'>

              <div class="flex flex-col gap-4 text-center">
                <h1 class="text-white text-4xl font-black @[480px]:text-6xl">
                  Memberi senyuman di setiap kuntum
                </h1>

                <h2 class="text-white text-base @[480px]:text-lg max-w-xl mx-auto">
                  Rangkaian bunga modern dan jasa buket untuk setiap kesempatan,
                  mulai dari wisuda hingga acara sosial khusus.
                </h2>
              </div>

              <div class="flex-wrap gap-4 flex justify-center">
                <a href="{{ route('catalogue') }}"
                   class="flex items-center justify-center rounded-full h-12 px-6 @[480px]:h-14 @[480px]:px-8 bg-primary text-white font-bold hover:bg-primary/90 transition">
                  Lihat Katalog
                </a>

                <a href="{{ route('about') }}"
                   class="flex items-center justify-center rounded-full h-12 px-6 @[480px]:h-14 @[480px]:px-8 bg-background-light/90 text-text-light font-bold hover:bg-background-light transition">
                  Tentang Kami
                </a>
              </div>
            </div>
          </div>
        </div>
      </main>

      {{-- FOOTER LINK (ORDER DIHAPUS) --}}
      <footer class="flex flex-col gap-8 px-5 py-12 text-center border-t mt-10">
        <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
          <a href="{{ route('home') }}" class="hover:text-primary">Beranda</a>
          <a href="{{ route('about') }}" class="hover:text-primary">Tentang Kami</a>
          <a href="{{ route('catalogue') }}" class="hover:text-primary">Katalog</a>
          <a href="{{ route('contact') }}" class="hover:text-primary">Kontak</a>
        </div>
      </footer>

    </div>
  </div>
</div>
@endsection
