<?php

use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view ('home');
});

Route::get('/about', function () {
    return view ('about');
});

Route::get('/program', function () {
    return view ('program');
});

Route::get('/our_team', function () {
    return view ('our_team');
});


Route::get('/welcome', function () {
    return view ('welcome');
});

Route::get('/hubungi-kami', function () {
return'<h1>Hubungi Kami</h1>';
});
Route::redirect('/contact-us', '/hubungi-kami');

Route::fallback(function () {
    return view('errorpage');
});