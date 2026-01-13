<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Homepage
Route::get('/', fn() => view('home'))->name('home');

// Halaman statis
Route::get('/home', fn() => view('home'))->name('home.page');
Route::get('/about', fn() => view('about'))->name('about');

// Katalog
Route::get('/catalogue', [ProductController::class, 'catalogue'])->name('catalogue');
Route::get('/catalogue/filter', [ProductController::class, 'filter'])->name('catalogue.filter');
Route::get('/hubungi-kami', fn() => view('contact'))->name('contact');

// Cart
Route::post('/cart/add/{product}', [CartController::class,'add'])
    ->name('cart.add');
Route::get('/cart', [CartController::class,'view'])->name('cart.view');
Route::delete('/cart/item/{item}', [CartController::class,'remove'])->name('cart.item.remove');

// Update quantity
Route::patch('/cart/item/{item}', [CartController::class,'update'])
    ->name('cart.item.update');

// Clear cart
Route::delete('/cart/clear', [CartController::class,'clear'])
    ->name('cart.clear');

// Checkout
Route::middleware(['web', 'user'])->group(function () {

    Route::get('/dashboard', function () {
        dd('DASHBOARD SESSION', session()->all());
    })->name('user.dashboard');

    Route::get('/checkout', [CheckoutController::class, 'show'])
        ->name('checkout.show');

    Route::post('/checkout', [CheckoutController::class, 'process'])
        ->name('checkout.process');

});

Route::middleware(AdminMiddleware::class)->group(function () {
    
    Route::get('/abyta-admin', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource('products', ProductController::class);

    Route::get('/abyta-admin/orders', [CheckoutController::class, 'adminOrders'])
        ->name('admin.orders');

    Route::post('/abyta-admin/orders/{order}/status',
    [CheckoutController::class, 'updateStatus']
    )->name('admin.orders.updateStatus');

    });
    
Route::get('/admin/login', function () {
    if (session()->has('user_role')) {
        return redirect()->route(
            session('user_role') === 'admin'
                ? 'admin.dashboard'
                : 'user.dashboard'
        );
    }

    return view('admin.login');
})->name('admin.login');


Route::post('/admin/login', function (Request $request) {
    
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    $user = User::where('email', $request->email)->first();
    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    session([
        'user_id'   => $user->id,
        'user_role' => $user->role,
        'user_name' => $user->name,
    ]);

    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return redirect('/dashboard');
})->name('admin.login.post');


Route::post('/admin/logout', function () {
    session()->forget(['user_id', 'user_role', 'user_name']);
    session()->invalidate();
    session()->regenerateToken();
    
    return redirect()->route('admin.login');
})->name('admin.logout');

// ===== REGISTER =====
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Illuminate\Http\Request $request) {

    $request->validate([
        'name'     => 'required|string|max:255',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    $user = \App\Models\User::create([
        'name'     => $request->name,
        'email'    => $request->email,
        'password' => \Illuminate\Support\Facades\Hash::make($request->password),
        'role'     => 'user',
    ]);

    // auto login
    session([
        'user_id'   => $user->id,
        'user_role' => $user->role,
        'user_name' => $user->name,
    ]);

    return redirect()->route('user.dashboard');
})->name('register.post');

Route::post('/logout', function () {
    session()->forget(['user_id', 'user_role', 'user_name']);
    session()->invalidate();
    session()->regenerateToken();

    return redirect()->route('admin.login');
})->name('logout');

Route::middleware('user')->group(function () {
    
    Route::get('/dashboard', function () {
        $userId = session('user_id');

        $totalOrders = Order::where('user_id', $userId)->count();

        $activeOrders = Order::where('user_id', $userId)
            ->whereIn('status', ['pending', 'processing', 'ready'])
            ->count();

        $completedOrders = Order::where('user_id', $userId)
            ->where('status', 'completed')
            ->count();

        return view('user.dashboard', compact(
            'totalOrders',
            'activeOrders',
            'completedOrders'
        ));

    })->name('user.dashboard');

    Route::get('/my-orders', function () {
        return view('user.orders.index');
    })->name('user.orders.index');

        Route::post('/user/logout', function () {
        session()->forget(['user_id', 'user_role', 'user_name']);
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('home');
    })->name('user.logout');

});

Route::middleware(['admin', 'nocache'])->group(function () {
    Route::get('/abyta-admin', fn() => view('admin.dashboard'))
        ->name('admin.dashboard');
});

Route::middleware(['user', 'nocache'])->group(function () {

    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

});

// Fallback
Route::fallback(fn() => view('errorpage'));