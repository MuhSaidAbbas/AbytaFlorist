<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

// Homepage
Route::get('/', fn() => view('home'))->name('home');

// Halaman statis
Route::get('/home', fn() => view('home'))->name('home.page');
Route::get('/about', fn() => view('about'))->name('about');

// Katalog
Route::get('/catalogue', [ProductController::class, 'catalogue'])->name('catalogue');
Route::get('/catalogue/filter', [ProductController::class, 'filter'])->name('catalogue.filter');
Route::get('/hubungi-kami', fn() => view('contact'))->name('contact');

// CRUD Produk
Route::resource('products', ProductController::class);

// Cart
Route::post('/cart/add', [CartController::class,'add'])->name('cart.add');
Route::post('/cart/add/{product}', [ProductController::class, 'addToCart'])
    ->name('cart.add');
Route::get('/cart', [CartController::class,'view'])->name('cart.view');
Route::delete('/cart/item/{item}', [CartController::class,'remove'])->name('cart.item.remove');

// Checkout
Route::get('/checkout', [CheckoutController::class,'show'])->name('checkout.show');
Route::post('/checkout', [CheckoutController::class,'process'])->name('checkout.process');

// Halaman Order
Route::get('/order', fn() => view('order'))->name('order');

// Fallback
Route::fallback(fn() => view('errorpage'));

// Admin Panel (jalur rahasia)
Route::get('/abyta-admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

