<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\OrderController as UserOrderController;

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'))->name('home');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/hubungi-kami', fn () => view('contact'))->name('contact');

/*
|--------------------------------------------------------------------------
| KATALOG
|--------------------------------------------------------------------------
*/

Route::get('/catalogue', [ProductController::class, 'catalogue'])
    ->name('catalogue');

Route::get('/catalogue/filter', [ProductController::class, 'filter'])
    ->name('catalogue.filter');

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::post('/cart/add/{product}', [CartController::class, 'add'])
    ->name('cart.add');

Route::get('/cart', [CartController::class, 'view'])
    ->name('cart.view');

Route::delete('/cart/item/{item}', [CartController::class, 'remove'])
    ->name('cart.item.remove');

Route::patch('/cart/item/{item}', [CartController::class, 'update'])
    ->name('cart.item.update');

Route::delete('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout/confirm', function () {
    return view('auth.logout-confirm');
})->name('logout.confirm');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
/*
|--------------------------------------------------------------------------
| USER (LOGIN REQUIRED)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/checkout', [CheckoutController::class, 'show'])
        ->name('checkout.show');

    Route::post('/checkout', [CheckoutController::class, 'process'])
        ->name('checkout.process');

    Route::get('/pesanan-saya', [UserOrderController::class, 'index'])
        ->name('user.orders.index');
});

/*
|--------------------------------------------------------------------------
| ADMIN AUTH
|--------------------------------------------------------------------------
*/

Route::get('/abyta-admin/login', [AuthController::class, 'showAdminLogin'])
    ->name('admin.login');

Route::post('/abyta-admin/login', [AuthController::class, 'login'])
    ->name('admin.login.post');

Route::get('/abyta-admin/login-success', function () {
    return view('admin.login-success');
})->name('admin.login.success');

Route::get('/abyta-admin/logout-success', function () {
    return view('admin.logout-success');
})->name('admin.logout.success');

/*
|--------------------------------------------------------------------------
| ADMIN (AUTH + ADMIN ROLE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('abyta-admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/', fn () => view('admin.dashboard'))
            ->name('dashboard');

        Route::resource('products', ProductController::class);

        Route::get('/orders', [CheckoutController::class, 'adminOrders'])
            ->name('orders');

        Route::post('/orders/{order}/status',
            [CheckoutController::class, 'updateStatus']
        )->name('orders.updateStatus');
});


/*
|--------------------------------------------------------------------------
| FALLBACK
|--------------------------------------------------------------------------
*/

Route::fallback(fn () => view('errorpage'));
