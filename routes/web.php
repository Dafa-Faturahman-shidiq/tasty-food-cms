<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PengunjungController;

// PENGUNJUNG
Route::get('/', [PengunjungController::class, 'showHome'])->name('home');
Route::get('/about', [PengunjungController::class, 'showAbout'])->name('about');
Route::get('/news', [PengunjungController::class, 'showNews'])->name('news.index');
Route::get('/gallery', [PengunjungController::class, 'showGallery'])->name('gallery');
Route::get('/contact', [PengunjungController::class, 'showContact'])->name('contact');


Route::get('/login', function () {
    return view('auth.login');
});
