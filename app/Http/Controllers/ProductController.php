<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Halaman katalog admin (/products)
     * Sudah mendukung search & filter.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->price == 'low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->price == 'high') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->latest()->paginate(12);

        return view('products.index', compact('products'));
    }

    /**
     * Form tambah produk (ADMIN ONLY)
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Simpan produk baru (ADMIN ONLY)
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:1000',
            'description' => 'nullable|string',
            'category'    => 'required|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('products', $imageName, 'public');

        Product::create([
            'name'        => $validated['name'],
            'price'       => $validated['price'],
            'description' => $validated['description'],
            'category'    => $validated['category'],
            'image'       => $imageName,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Halaman katalog utama pengunjung (/catalogue)
     */
    public function catalogue(Request $request)
    {
        $query = Product::query();

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category) {
            $query->whereRaw('LOWER(category) = ?', [strtolower($request->category)]);
        }

        if ($request->price == '0-500') {
            $query->whereBetween('price', [0, 500000]);
        } elseif ($request->price == '500-1jt') {
            $query->whereBetween('price', [500000, 1000000]);
        } elseif ($request->price == '1jt+') {
            $query->where('price', '>=', 1000000);
        }

        if ($request->price == 'low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->price == 'high') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->get();

        $cart = null;
        if (session()->has('cart_session_key')) {
            $cart = Cart::where('session_key', session('cart_session_key'))
                ->with('items.product')
                ->first();
        }

        return view('catalogue', compact('products', 'cart'));
    }

    /**
     * Form edit produk (ADMIN ONLY)
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update produk (ADMIN ONLY)
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
            'category'    => 'required|string',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('products', $imageName, 'public');
            $validated['image'] = $imageName;
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk (ADMIN ONLY)
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return back()->with('success', 'Produk dihapus.');
    }

    /**
     * Deprecated
     */
    public function filter(Request $request)
    {
        return redirect()->route('catalogue');
    }
}
