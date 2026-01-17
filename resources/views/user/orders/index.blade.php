@extends('layouts.user')

@section('title', 'Pesanan Saya')

@section('content')

<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Pesanan Saya</h2>

    <!-- FILTER BAR -->
    <form method="GET" action="{{ route('user.orders.index') }}" class="mb-6">
        <div class="flex flex-col lg:flex-row gap-4 items-center flex-wrap">

            <!-- SEARCH + REFRESH -->
            <div class="flex items-center lg:flex-1 w-full gap-3">

            <!-- SEARCH INPUT -->
            <div class="flex items-center flex-1 h-12 rounded-full
                        bg-gray-100 border-2 border-black
                        px-4">
                <!-- SEARCH BUTTON -->
                <button type="submit" class="mr-2 text-gray-600 hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35m1.6-5.15a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>

                <input
                type="text"
                name="search"
                placeholder="Cari nama, telepon, alamat, status..."
                value="{{ request('search') }}"
                class="w-full bg-transparent focus:outline-none
                        text-sm font-normal text-gray-900
                        placeholder-gray-500"
                />
            </div>

            <!-- REFRESH ICON -->
            <a href="{{ route('user.orders.index') }}"
            class="flex items-center justify-center
                    w-12 h-12 rounded-full
                    border-2 border-black
                    bg-gray-100 text-black
                    hover:bg-gray-200 transition">

                <!-- CLEAN CIRCULAR REFRESH ICON -->
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.2"
                    stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M21 12a9 9 0 1 1-2.64-6.36"/>
                    <polyline points="21 3 21 9 15 9"/>
                </svg>
            </a>
            </div>

            <!-- FILTER SELECT -->
            <div class="flex gap-3 shrink-0">

            <!-- STATUS -->
            <select name="status"
                class="h-12 rounded-full bg-gray-100
                    border-2 border-black
                    px-4 pr-10 text-sm
                    font-semibold text-gray-900
                    focus:outline-none">
                <option value="">Semua Status</option>
                <option value="tertunda" {{ request('status')=='tertunda'?'selected':'' }}>Tertunda</option>
                <option value="diproses" {{ request('status')=='diproses'?'selected':'' }}>Diproses</option>
                <option value="dikirim" {{ request('status')=='dikirim'?'selected':'' }}>Dikirim</option>
                <option value="selesai" {{ request('status')=='selesai'?'selected':'' }}>Selesai</option>
                <option value="dibatalkan" {{ request('status')=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
            </select>

            <!-- TANGGAL -->
            <input type="date"
                name="date"
                value="{{ request('date') }}"
                class="h-12 rounded-full bg-gray-100
                    border-2 border-black
                    px-4 text-sm
                    font-semibold text-gray-900
                    focus:outline-none">
            </div>

            <!-- TERAPKAN -->
            <div class="w-full lg:w-auto flex justify-end flex-none">
                <button
                    type="submit"
                    class="h-12 rounded-full bg-gray-100
                        border-2 border-black
                        px-4 text-sm
                        font-semibold text-gray-900
                        focus:outline-none
                        active:scale-[0.98]
                        transition-all duration-150">
                    Terapkan
                </button>
            </div>
        </div>
    </form>

    @if($orders->isEmpty())
        <p class="text-gray-600">Belum ada pesanan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Alamat</th>
                        <th class="p-3 text-left">Total</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Tanggal</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        @php
                            $statusClass = [
                                'tertunda' => 'bg-yellow-100 text-yellow-800',
                                'diproses' => 'bg-blue-100 text-blue-800',
                                'dikirim' => 'bg-purple-100 text-purple-800',
                                'selesai' => 'bg-green-100 text-green-800',
                                'dibatalkan' => 'bg-red-100 text-red-800',
                            ];
                        @endphp

                        <tr class="border-t">
                            <td class="p-3">{{ $order->customer_name }}</td>
                            <td class="p-3">{{ $order->customer_address }}</td>
                            <td class="p-3">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $statusClass[$order->status] ?? 'bg-gray-100' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="p-3">
                                {{ $order->created_at->format('d M Y H:i') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

@endsection
