@extends('layouts.master')

@section('content')
<div class="max-w-3xl mx-auto p-4">
    <h1 class="text-2xl font-semibold mb-6">Keranjang</h1>

    @if($cart->items->isEmpty())
        <p>Keranjang kosong</p>
    @else

    {{-- LIST ITEM --}}
    <div class="space-y-4">
        @foreach($cart->items as $item)
        <div class="flex items-center justify-between border p-4 rounded">
            <div class="flex items-center gap-4">
                <img
                    src="{{ $item->product->image ? asset('storage/'.$item->product->image) : '/placeholder.png' }}"
                    class="w-20 h-20 object-cover rounded">

                <div>
                    <div class="font-semibold">{{ $item->product->name }}</div>

                    {{-- UPDATE QTY --}}
                    <form method="POST"
                          action="{{ route('cart.item.update', $item) }}"
                          class="flex items-center gap-2 mt-2">
                        @csrf
                        @method('PATCH')

                        <input type="number"
                               name="quantity"
                               value="{{ $item->quantity }}"
                               min="1"
                               class="w-16 border rounded px-2 py-1 text-sm">

                        <button class="text-sm text-blue-600 hover:underline">
                            Update
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-right">
                <div class="font-semibold mb-2">
                    Rp{{ number_format($item->subtotal(),0,',','.') }}
                </div>

                {{-- HAPUS ITEM --}}
                <form action="{{ route('cart.item.remove', $item) }}"
                      method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm text-red-600 hover:underline">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

    {{-- TOTAL & ACTION --}}
    <div class="mt-8 p-4 border rounded">
        <div class="flex justify-between font-semibold text-lg mb-4">
            <span>Total</span>
            <span>Rp{{ number_format($cart->total(),0,',','.') }}</span>
        </div>

        <div class="flex gap-3">
            {{-- CHECKOUT --}}
            <a href="{{ route('checkout.show') }}"
               class="flex-1 text-center bg-pink-600 text-white py-2 rounded hover:bg-pink-700">
                Checkout Sekarang
            </a>

            {{-- KOSONGKAN KERANJANG --}}
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Kosongkan
                </button>
            </form>
        </div>
    </div>

    @endif
</div>
@endsection
