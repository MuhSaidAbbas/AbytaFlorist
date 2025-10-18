@extends('master')

@section('title','Tentang Abyta Florist')

@section('content')
<div class="flex flex-1 justify-center">
  <div class="layout-content-container flex flex-col max-w-[960px] flex-1">
    <main class="py-10 px-4">
      <section class="flex flex-col items-center text-center p-4 @container mb-12">
        <div class="flex w-full flex-col gap-6 items-center">
          <div class="bg-center bg-no-repeat aspect-square bg-cover rounded-full h-40 w-40" data-alt="Potret Clarita Risma Saputri"
               style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD5aQqdU8EZ3tx5jZj1DLIjsZUqmAP23xldFtZwobx2UrHcT3CpakCO2c51Vw4nw6uGFNWqgSQ9gN7va7jkvBPBIijUIkxV-bkTcADR9265g9M6nuiU74LVxCvSWv2ks8MJ1tc6pnzkca7vHflTttH5p_C39xwJTR8VDXujabThI0u8mh1dk1e043GIb5EoplgR7UrKvUT7CMnrcdv6W8n9kpOx-ijd0ngw-XKL-theCsOqh45tymeNSdf_3v1fnv6ElxtCdBDX8XE");'></div>
          <div class="flex flex-col justify-center">
            <h2 class="text-3xl font-bold leading-tight tracking-tighter text-primary dark:text-soft-pink">Clarita Risma Saputri</h2>
            <p class="text-lg font-medium text-text-light/80 dark:text-text-dark/80 mt-1">Kenali Pendiri kami</p>
          </div>
        </div>
      </section>

      <section class="mb-16">
        <h2 class="text-2xl font-bold leading-tight tracking-tight px-4 pb-4 text-center">Kisah Abyta Florist</h2>
        <p class="text-base font-normal leading-relaxed text-text-light/90 dark:text-text-dark/90 text-center max-w-3xl mx-auto">
          Abyta Florist lahir dari hasrat terhadap desain bunga modern dan keinginan untuk membawa energi segar dan muda ke dunia toko bunga. Perjalanan kami dimulai dengan ide sederhana: untuk menciptakan rangkaian bunga kontemporer yang indah yang merayakan momen-momen spesial dalam hidup, terutama bagi kaum muda. Kami percaya bahwa bunga lebih dari sekadar dekorasi; mereka adalah bentuk ekspresi, cara untuk berbagi kegembiraan, dan simbol awal yang baru. Fokus kami pada acara wisuda dan stan sosial mencerminkan komitmen kami untuk menjadi bagian dari tonggak paling berkesan dalam kehidupan pelanggan kami. Setiap buket dibuat dengan cinta, kreativitas, dan sentuhan keanggunan modern, menjadikan setiap kreasi Abyta Florist sebuah karya seni yang unik.
        </p>
      </section>

      <section>
        <h2 class="text-2xl font-bold leading-tight tracking-tight px-4 pb-6 text-center">Kolaborasi Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 p-4">
          <div class="flex flex-col items-center gap-4 bg-soft-pink/20 dark:bg-primary/10 p-6 rounded-xl">
            <div class="w-48 h-24 bg-contain bg-center bg-no-repeat" data-alt="Logo ESQ 165" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuA8ov1QwYLC187bk6O_Q2s4guwC5YnW3SNjT8UxQUgKS-AgmEZ2pHAg7XuGkmeXbEy5QcLdbDmV8OUSQBvdkiKrxOtmr0fVZpYMuX_QbtA-h_2vsWUGqUtoU1vuEWz4A3bKWK4gDVWe4oe2twtf4I2lZCstWoA9adGLD9ARPymfLtIfLs0UqpRQk3KNxLzJ249c95WiYmh5b5fZFvTDQ6znEPPmYK9-XtF6NcB7ZrxywXMZvriuquNmiKaYwPMNoiL4scjGPJUeOCw");'></div>
            <p class="text-center text-sm">Sebuah kolaborasi untuk menyediakan rangkaian bunga yang indah untuk acara perusahaan dan program pelatihan kepemimpinan mereka.</p>
          </div>
          <div class="flex flex-col items-center gap-4 bg-soft-pink/20 dark:bg-primary/10 p-6 rounded-xl">
            <div class="w-48 h-24 bg-contain bg-center bg-no-repeat" data-alt="Logo Amgala" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCTsJABb_XtX1x4qU0eqqpERQcvv8Q75btNMOPzOnORlUmt5TC2g2ZuBIGerib6SXzjuF2mw0O__K8RAoHUj7pQI82-IhjG7UwYU2h6PKrekjNJdLFarn5DaY1J68NyKth0cg4ykebJ3xHdCPeHZzXdPvEQvgRgNeZZa3qAnSeCJ-ZKzaZ9QkHbBYT4UqYyOYxcp9eG6MMiDqsxMZis_xhP9JXC7LJgIUfC8vRJTMDDZDGHxa55ZTRX17lqe-yV18tTx4ZoCrndp7g");'></div>
            <p class="text-center text-sm">Bermitra dengan Amgala untuk menciptakan photobooth menakjubkan yang dihiasi dengan desain bunga modern kami untuk berbagai acara sosial.</p>
          </div>
        </div>
      </section>
    </main>
  </div>
</div>
@endsection
