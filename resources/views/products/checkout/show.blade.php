@extends('layouts.master')

@section('title', 'Checkout')

@section('content')
<div class="max-w-xl mx-auto bg-white shadow rounded-xl p-6">

    <h2 class="text-2xl font-bold mb-4">Checkout</h2>

    {{-- Review Pesanan --}}
    <div class="mb-4 border-b pb-4">
        @foreach($cart->items as $item)
            <div class="flex justify-between mb-2">
                <span>{{ $item->product->name }} (Qty {{ $item->quantity }})</span>
                <span>
                    Rp{{ number_format($item->product->price * $item->quantity,0,',','.') }}
                </span>
            </div>
        @endforeach
    </div>

    {{-- FORM CHECKOUT --}}
    <form method="POST" action="{{ route('checkout.process') }}">
        @csrf

        {{-- Nama --}}
        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Nama Lengkap</label>
            <input type="text" name="name" required
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Nomor --}}
        <div class="mb-3">
            <label class="block text-sm font-medium mb-1">Nomor WhatsApp</label>
            <input type="text" name="phone" required
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Alamat --}}
        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Alamat Pengiriman</label>
            <textarea name="address" required
                      class="w-full border rounded px-3 py-2"></textarea>
        </div>

        {{-- Total --}}
        <div class="flex justify-between text-lg font-semibold mb-4">
            <span>Total</span>
            <span>
                Rp{{ number_format(
                    $cart->items->sum(fn($i)=>$i->product->price*$i->quantity),
                    0,',','.'
                ) }}
            </span>
        </div>

        {{-- Submit --}}
        <button type="submit"
                class="w-full bg-pink-600 text-white py-2 rounded-lg hover:bg-pink-700">
            Konfirmasi Pembayaran
        </button>
    </form>

</div>
@endsection
