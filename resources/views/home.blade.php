@extends('layouts.master')

@section('title','Abyta Florist')

@section('content')
<div class="relative flex h-auto min-h-[60vh] w-full flex-col group/design-root overflow-x-hidden">
  <div class="px-4 md:px-10 lg:px-40 flex flex-1 justify-center py-5">
    <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
      <main class="flex-1">
        <div class="@container mt-5">
          <div class="p-0 @[480px]:p-4">
            <div class="flex min-h-[520px] flex-col gap-6 bg-cover bg-center bg-no-repeat @[480px]:gap-8 rounded-lg items-center justify-center p-4"
                 data-alt="A beautiful modern bouquet of flowers with maroon and pink tones."
                 style='background-image: linear-gradient(rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.5) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuALeu1DlsCEpBOXV_VttWuir6QP0EvJR5q7Kkrtm6SiQhqevPtV30bhDcT-yZWVOmjC8G1y2tQU_9VtApC-f5R8RintBlWqZfCs-KQcIFbLFSkE-ELiA_dFwjUSqpLvHEwQHAj4kW63EkFuZcIJngltMhq0cNOPFga-SFLNRFtkGAJxvqUfK8PAbQiDT-Nze4OLho2dqFYrcyYSPEfUuE7aVvtqec2A2UQHZX7fq6DT1dtoNjrQ-iASt3CD5ysvRO8EfbMa569zrqo");'>
              <div class="flex flex-col gap-4 text-center">
                <h1 class="text-white text-4xl font-black leading-tight tracking-[-0.033em] @[480px]:text-6xl @[480px]:font-black @[480px]:leading-tight @[480px]:tracking-[-0.033em]">
                  Memberi senyuman di setiap kuntum
                </h1>
                <h2 class="text-white text-base font-normal leading-normal @[480px]:text-lg @[480px]:font-normal @[480px]:leading-normal max-w-xl mx-auto">
                  Rangkaian bunga modern dan jasa buket untuk setiap kesempatan, mulai dari wisuda hingga acara sosial khusus.
                </h2>
              </div>

              <div class="flex-wrap gap-4 flex justify-center">
                {{-- tombol jadi link supaya pindah halaman --}}
                <a href="{{ route('catalogue') }}"
                   class="flex min-w-[120px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 @[480px]:h-14 @[480px]:px-8 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] @[480px]:text-lg @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] hover:bg-primary/90 transition-colors">
                  <span class="truncate">Lihat Katalog</span>
                </a>

                <a href="{{ route('about') }}"
                   class="flex min-w-[120px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-full h-12 px-6 @[480px]:h-14 @[480px]:px-8 bg-background-light/90 text-text-light text-base font-bold leading-normal tracking-[0.015em] @[480px]:text-lg @[480px]:font-bold @[480px]:leading-normal @[480px]:tracking-[0.015em] hover:bg-background-light transition-colors">
                  <span class="truncate">Tentang Kami</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </main>

      <footer class="flex flex-col gap-8 px-5 py-12 text-center @container border-t border-solid border-secondary/50 dark:border-primary/50 mt-10">
        <div class="flex flex-wrap items-center justify-center gap-x-8 gap-y-4">
          <a class="text-text-muted-light dark:text-text-muted-dark text-base font-normal leading-normal hover:text-primary dark:hover:text-secondary" href="{{ route('home') }}">Beranda</a>
          <a class="text-text-muted-light dark:text-text-muted-dark text-base font-normal leading-normal hover:text-primary dark:hover:text-secondary" href="{{ route('about') }}">Tentang Kami</a>
          <a class="text-text-muted-light dark:text-text-muted-dark text-base font-normal leading-normal hover:text-primary dark:hover:text-secondary" href="{{ route('catalogue') }}">Katalog</a>
          <a class="text-text-muted-light dark:text-text-muted-dark text-base font-normal leading-normal hover:text-primary dark:hover:text-secondary" href="{{ route('order') }}">Pesan</a>
          <a class="text-text-muted-light dark:text-text-muted-dark text-base font-normal leading-normal hover:text-primary dark:hover:text-secondary" href="{{ route('contact') }}">Kontak</a>
        </div>
      </footer>
    </div>
  </div>
</div>
@endsection
