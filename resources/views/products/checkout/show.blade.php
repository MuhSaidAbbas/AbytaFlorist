@extends('layouts.master')
@section('content')
  <div class="max-w-lg mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-xl font-semibold mb-4">Checkout</h2>

    <div class="mb-4">
      <h3 class="font-medium">Review Pesanan</h3>
      <div class="mt-2">
        @foreach($cart->items as $item)
          <div class="flex items-center gap-3 py-2 border-b">
            <img src="{{ $item->uploaded_image ? asset('storage/'.$item->uploaded_image) : asset('storage/'.$item->product->image) }}" class="w-16 h-16 object-cover rounded">
            <div>
              <div class="font-semibold">{{ $item->product->name }}</div>
              <div class="text-sm">Qty {{ $item->quantity }}</div>
            </div>
            <div class="ml-auto font-semibold">Rp{{ number_format($item->subtotal(),0,',','.') }}</div>
          </div>
        @endforeach
      </div>
    </div>

    <form action="{{ route('checkout.process') }}" method="POST" class="space-y-3">
      @csrf
      <div>
        <label class="block text-sm">Nama</label>
        <input name="name" required class="w-full border rounded px-3 py-2">
        @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
      </div>
      <div>
        <label class="block text-sm">Nomor WhatsApp</label>
        <input name="phone" required class="w-full border rounded px-3 py-2">
        @error('phone') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
      </div>

      <div class="pt-2">
        <div class="flex justify-between font-semibold">
          <span>Total</span>
          <span>Rp{{ number_format($cart->total(),0,',','.') }}</span>
        </div>
      </div>

      <button type="submit" class="w-full bg-pink-600 text-white py-2 rounded">Konfirmasi Pembayaran</button>
    </form>
  </div>
@endsection
