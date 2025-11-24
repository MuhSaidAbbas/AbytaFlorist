<?php
// app/Http/Controllers/CartController.php
namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller {
    // ensure cart exists for session
    protected function getCart() {
        $sessionKey = session()->get('cart_session_key');
        if (!$sessionKey) {
            $sessionKey = Str::uuid()->toString();
            session(['cart_session_key' => $sessionKey]);
        }
        $cart = Cart::firstOrCreate(['session_key'=>$sessionKey]);
        return $cart;
    }

    public function add(Request $request) {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'uploaded_image' => 'nullable|image|max:4096',
        ]);

        $cart = $this->getCart();
        $product = Product::findOrFail($data['product_id']);
        $quantity = $data['quantity'] ?? 1;

        $uploadedPath = null;
        if ($request->hasFile('uploaded_image')) {
            $uploadedPath = $request->file('uploaded_image')->store('cart_uploads', 'public');
        }

        // If same product exists and uploaded_image null (or same), merge quantities.
        $existing = $cart->items()->where('product_id', $product->id)
                         ->whereNull('uploaded_image')
                         ->first();

        if ($existing && $uploadedPath === null) {
            $existing->increment('quantity', $quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $quantity,
                'uploaded_image' => $uploadedPath,
            ]);
        }

        return back()->with('success','Produk ditambahkan ke keranjang.');
    }

    public function view() {
        $cart = $this->getCart()->load('items.product');
        return view('cart.index', compact('cart'));
    }

    public function remove(CartItem $item) {
        $item->delete();
        return back()->with('success','Item dihapus.');
    }
}
