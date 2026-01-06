<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Pastikan cart ada berdasarkan session
     */
    protected function getCart()
    {
        $sessionKey = session()->get('cart_session_key');

        if (!$sessionKey) {
            $sessionKey = Str::uuid()->toString();
            session(['cart_session_key' => $sessionKey]);
        }

        return Cart::firstOrCreate([
            'session_key' => $sessionKey
        ]);
    }

    /**
     * Tambah produk ke cart
     */
    public function add(Request $request, Product $product)
    {
        $cart = $this->getCart();

        $item = $cart->items()
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang.');
    }

    /**
     * Tampilkan halaman cart
     */
    public function view()
    {
        $cart = $this->getCart()->load('items.product');

        return view('cart.index', compact('cart'));
    }

    /**
     * Update quantity item
     */
    public function update(Request $request, CartItem $item)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $item->update([
            'quantity' => $request->quantity
        ]);

        return back()->with('success', 'Jumlah produk diperbarui.');
    }

    /**
     * Hapus satu item dari cart
     */
    public function remove(CartItem $item)
    {
        $item->delete();

        return back()->with('success', 'Item dihapus dari keranjang.');
    }

    /**
     * Kosongkan seluruh cart
     */
    public function clear()
    {
        $sessionKey = session('cart_session_key');

        if ($sessionKey) {
            $cart = Cart::where('session_key', $sessionKey)->first();

            if ($cart) {
                $cart->items()->delete();
                $cart->delete();
            }
        }

        session()->forget('cart_session_key');

        return redirect()->route('cart.view')
            ->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
