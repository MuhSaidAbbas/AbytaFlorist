@extends('layouts.master')

@section('title','Abyta Florist - Pesan')

@section('content')
<header class="sticky top-0 z-10 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-sm">
  <div class="px-4 md:px-10 lg:px-20">
    <div class="flex items-center justify-between whitespace-nowrap border-b border-solid border-border-light dark:border-border-dark px-4 md:px-10 py-3">
      <div class="flex items-center gap-4 text-text-light dark:text-text-dark">
        <div class="size-6">
          <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475Z" fill-rule="evenodd"></path>
          </svg>
        </div>
        <h2 class="text-xl font-bold leading-tight tracking-[-0.015em]">Abyta Florist</h2>
      </div>
    </div>
  </div>
</header>

<main class="flex-1 px-4 py-10 md:px-10 lg:px-20 flex justify-center">
  <div class="w-full max-w-2xl">
    <div class="text-center mb-10">
      <p class="text-4xl font-black leading-tight tracking-[-0.033em] text-text-light dark:text-text-dark">
        Lakukan Pemesanan Anda
      </p>
    </div>

    <div class="bg-background-light dark:bg-background-dark/50 p-6 sm:p-8 rounded-xl shadow-lg border border-border-light dark:border-border-dark">

      {{-- FORM PEMESANAN --}}
      <form class="space-y-6" method="POST" action="{{ route('checkout.process') }}">
        @csrf

        <label class="flex flex-col">
          <p class="text-base font-medium leading-normal pb-2">Nama Lengkap</p>
          <input 
            name="name"
            class="form-input flex w-full rounded-lg border border-border-light dark:border-border-dark p-[15px]"
            placeholder="Masukkan nama lengkap Anda"
            required
          />
        </label>

        <label class="flex flex-col">
          <p class="text-base font-medium leading-normal pb-2">Nomor Telepon</p>
          <input 
            name="phone"
            class="form-input flex w-full rounded-lg border border-border-light dark:border-border-dark p-[15px]"
            placeholder="Masukkan nomor telepon Anda"
            required
          />
        </label>

        <label class="flex flex-col">
          <p class="text-base font-medium leading-normal pb-2">Alamat Pengiriman</p>
          <textarea 
            name="address"
            class="form-textarea flex w-full rounded-lg border border-border-light dark:border-border-dark p-[15px] min-h-32"
            placeholder="Masukkan alamat lengkap"
            required
          ></textarea>
        </label>

        <button 
          class="w-full bg-primary text-white font-bold py-4 px-4 rounded-lg hover:bg-primary/90 transition"
          type="submit"
        >
          Kirim Pesanan
        </button>

      </form>
      {{-- END FORM --}}

    </div>
  </div>
</main>
@endsection
