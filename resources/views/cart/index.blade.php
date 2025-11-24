@extends('layouts.master')
@section('content')
  <div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-4">Keranjang</h1>

    @if($cart->items->isEmpty())
      <p>Keranjang kosong</p>
    @else
      <div class="space-y-4">
        @foreach($cart->items as $item)
          <div class="flex items-center justify-between border p-3 rounded">
            <div class="flex items-center gap-3">
              <img src="{{ $item->uploaded_image ? asset('storage/'.$item->uploaded_image) : ($item->product->image ? asset('storage/'.$item->product->image) : '/placeholder.png') }}" class="w-20 h-20 object-cover rounded">
              <div>
                <div class="font-semibold">{{ $item->product->name }}</div>
                <div class="text-sm text-gray-600">Qty: {{ $item->quantity }}</div>
              </div>
            </div>
            <div class="text-right">
              <div class="font-semibold">Rp{{ number_format($item->subtotal(),0,',','.') }}</div>
              <form action="{{ route('cart.item.remove', $item) }}" method="POST" class="mt-2">
                @csrf @method('DELETE')
                <button class="text-sm text-red-600">Hapus</button>
              </form>
            </div>
          </div>
        @endforeach
      </div>

      <div class="mt-6 p-4 border rounded">
        <div class="flex justify-between font-semibold mb-3">
          <span>Total</span>
          <span>Rp{{ number_format($cart->total(),0,',','.') }}</span>
        </div>

        <!-- Modal trigger - kita juga sediakan form langsung -->
        <a href="{{ route('checkout.show') }}" class="block text-center bg-pink-600 text-white py-2 rounded">Checkout Sekarang</a>
      </div>
    @endif
  </div>
@endsection
