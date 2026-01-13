@extends('layouts.admin')

@section('content')
<div class="bg-white rounded-xl shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Daftar Pesanan</h2>

    {{-- FILTER STATUS --}}
    <form method="GET" class="mb-4 flex items-center gap-3">
        <label class="text-sm font-semibold">Filter Status:</label>
        <select
            name="status"
            onchange="this.form.submit()"
            class="
                appearance-none
                cursor-pointer
                px-3 py-1 rounded-full
                text-xs font-semibold
                border
                bg-gray-100 text-gray-800
                focus:outline-none
            "
        >
            <option value="">Semua</option>
            @foreach ($statuses as $key => $label)
                <option value="{{ $key }}"
                    {{ request('status') === $key ? 'selected' : '' }}>
                    {{ $label }}
                </option>
            @endforeach
        </select>

    </form>

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

                                <form method="POST"
                                    action="{{ route('admin.orders.updateStatus', $order) }}">
                                    @csrf

                                    @php
                                        $statusClasses = [
                                            'pending'    => 'bg-yellow-100 text-yellow-800',
                                            'processing' => 'bg-blue-100 text-blue-800',
                                            'ready'      => 'bg-purple-100 text-purple-800',
                                            'completed'  => 'bg-green-100 text-green-800',
                                            'cancelled'  => 'bg-red-100 text-red-800',
                                        ];
                                    @endphp

                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="
                                            appearance-none cursor-pointer
                                            px-3 py-1 pr-8 rounded-full text-xs font-semibold
                                            border border-transparent
                                            {{ $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-800' }}
                                        "
                                    >
                                        @foreach (\App\Models\Order::statuses() as $key => $label)
                                            <option value="{{ $key }}"
                                                {{ $order->status === $key ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </select>

                                </form>

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
