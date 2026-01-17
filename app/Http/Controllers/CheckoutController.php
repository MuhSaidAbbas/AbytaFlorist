<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Ambil cart berdasarkan session
     */
    protected function getCart()
    {
        $sessionKey = session('cart_session_key');

        return $sessionKey
            ? Cart::where('session_key', $sessionKey)->with('items.product')->first()
            : null;
    }

    /**
     * ✅ HALAMAN CHECKOUT (INI YANG TADI HILANG)
     */
    public function show()
    {
        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('catalogue')
                ->with('error', 'Keranjang masih kosong.');
        }

        return view('products.checkout.show', compact('cart'));
    }

    /**
     * Proses checkout (kirim pesanan)
     */
    public function process(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'phone'   => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return back()->with('error','Keranjang kosong.');
        }

        $total = $cart->items->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        Order::create([
            'customer_name'    => $validated['name'],
            'customer_phone'   => $validated['phone'],
            'customer_address' => $validated['address'],
            'total'            => $total,
            'status'           => 'pending',
        ]);

        // Bersihkan cart
        $cart->items()->delete();
        $cart->delete();
        session()->forget('cart_session_key');

        return redirect()->route('catalogue')
            ->with('success','Checkout berhasil. Terima kasih!');
    }

    /**
     * Halaman admin melihat semua order
     */
    public function adminOrders(Request $request)
    {
        $query = \App\Models\Order::query();

        // SEARCH (nama, telepon, alamat, status)
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('customer_name', 'like', "%{$search}%")
                ->orWhere('customer_phone', 'like', "%{$search}%")
                ->orWhere('customer_address', 'like', "%{$search}%")
                ->orWhere('status', 'like', "%{$search}%");
            });
        }

        // FILTER STATUS (dari tombol TERAPKAN)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // FILTER TANGGAL (dari tombol TERAPKAN)
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $orders = $query->latest()->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:tertunda,diproses,dikirim,selesai,dibatalkan',
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->back()
            ->withFragment($request->anchor)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
