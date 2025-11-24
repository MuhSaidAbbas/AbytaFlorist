<?php
// app/Http/Controllers/CheckoutController.php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Order; // if you implement orders
use Illuminate\Http\Request;

class CheckoutController extends Controller {
    protected function getCart() {
        $sessionKey = session('cart_session_key') ?? null;
        return $sessionKey ? Cart::where('session_key', $sessionKey)->first() : null;
    }

    public function show() {
        $cart = $this->getCart();
        if (!$cart || $cart->items()->count() === 0) {
            return redirect()->route('products.index')->with('error','Keranjang kosong.');
        }
        $cart->load('items.product');
        return view('checkout.show', compact('cart'));
    }

    public function process(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $cart = $this->getCart();
        if (!$cart || $cart->items()->count() === 0) {
            return back()->with('error','Keranjang kosong.');
        }

        // contoh: simpan order (opsional)
        // $order = Order::create([...]);
        // loop items -> create order items

        // For now: simulate success, clear cart
        $cart->items()->delete();
        $cart->delete();
        session()->forget('cart_session_key');

        return redirect()->route('products.index')->with('success','Checkout berhasil. Terima kasih!');
    }
}
