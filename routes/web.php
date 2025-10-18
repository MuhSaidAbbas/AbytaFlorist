<?php
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('home'));
Route::get('/home', fn() => view('home'))->name('home');
Route::get('/about', fn() => view('about'))->name('about');
Route::get('/catalogue', fn() => view('catalogue'))->name('catalogue');
Route::get('/order', fn() => view('order'))->name('order');
Route::get('/hubungi-kami', fn() => view('contact'))->name('contact');
Route::fallback(fn() => view('errorpage'));


Route::fallback(fn() => view('errorpage'));
