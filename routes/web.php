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

Route::prefix('/admin')->group(function () {
 Route::get('/mahasiswa', function () {
 echo "<h1>Daftar Mahasiswa</h1>";
 });
 Route::get('/dosen', function () {
 echo "<h1>Daftar Dosen</h1>";
 });
 Route::get('/karyawan', function () {
 echo "<h1>Daftar Karyawan</h1>";
 });
});

Route::fallback(function () {
    return view('errorpage');
});