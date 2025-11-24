@extends('layouts.master')

@section('title','Kontak - Abyta Florist')

@section('content')
<div class="px-4 md:px-20 lg:px-40 flex flex-1 justify-center py-5">
  <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
    <main class="grow">
      <div class="@container">
        <div class="@[480px]:px-4 @[480px]:py-3 my-8">
          <div class="bg-cover bg-center flex flex-col justify-end overflow-hidden bg-background-light dark:bg-background-dark @[480px]:rounded-xl min-h-[32rem]" data-alt="A beautiful modern floral arrangement with soft pink and white flowers" style='background-image: linear-gradient(0deg, rgba(0, 0, 0, 0.4) 0%, rgba(0, 0, 0, 0) 40%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuBBAWHpGp4KhJnz8PVicU8oQNim9ylJjeEEloJiGxCYLoNS1njbXxzghIdOMW7EYpibsXbnIGkAS9m2TZXvLFnmFSMRy0b9gPoaXLOZuxCckwtoo7ASVsxNd6EUbG8oF7gdLoX02shbRFsY_ARtVDQ77_-JZPDMzdCOjE3rPQj9V9zl2Jd248oGWZh9uc38XmO0nWHj2uXe8tpUlDXim3nD3djlDa1Xbi_Jkb4Rtb3pSjnI8-tEY7icGbvH_k2p2N3_eFTzKH5e1uM");'>
            <div class="flex p-8">
              <p class="text-white text-4xl font-bold leading-tight">Hubungi Kami</p>
            </div>
          </div>
        </div>
      </div>

      <div class="flex justify-center py-8">
        <div class="flex flex-1 gap-4 max-w-[480px] flex-col items-stretch px-4 py-3">
          <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] w-full hover:bg-primary/90 transition-colors" href="#">
            <span class="truncate">WhatsApp</span>
          </a>
          <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] w-full hover:bg-primary/90 transition-colors" href="#">
            <span class="truncate">Instagram</span>
          </a>
          <a class="flex min-w-[84px] max-w-[480px] cursor-pointer items-center justify-center overflow-hidden rounded-lg h-14 px-5 bg-primary text-white text-base font-bold leading-normal tracking-[0.015em] w-full hover:bg-primary/90 transition-colors" href="#">
            <span class="truncate">Email</span>
          </a>
        </div>
      </div>
    </main>
  </div>
</div>
@endsection
