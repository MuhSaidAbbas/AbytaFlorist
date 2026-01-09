@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Pesanan</h2>

    @if($orders->isEmpty())
        <p class="text-gray-600">Belum ada pesanan.</p>
    @else
        <div class="overflow-x-auto">
            <table class="w-full text-sm border">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Telepon</th>
                        <th class="p-3 text-left">Alamat</th>
                        <th class="p-3 text-left">Total</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-left">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-t">
                            <td class="p-3">{{ $order->customer_name }}</td>
                            <td class="p-3">{{ $order->customer_phone }}</td>
                            <td class="p-3">{{ $order->customer_address }}</td>
                            <td class="p-3">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded bg-yellow-100 text-yellow-800">
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
