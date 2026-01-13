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
     * Tampilkan halaman checkout
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
            'user_id'          => session('user_id'),
            'customer_name'    => $validated['name'],
            'customer_phone'   => $validated['phone'],
            'customer_address' => $validated['address'],
            'total'            => $total,
            'status'           => Order::STATUS_PENDING,
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
        $query = Order::latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->get();
        $statuses = Order::statuses();

        return view('admin.orders.index', compact('orders', 'statuses'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:' . implode(',', array_keys(Order::statuses())),
        ]);

        $order->update([
            'status' => $request->status,
        ]);

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
