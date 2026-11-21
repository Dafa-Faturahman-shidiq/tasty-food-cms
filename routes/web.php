<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CompanyProfileController;

// AUTHENTICATION
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// ADMIN
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // admin dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('news', NewsController::class)->except(['show']);
    Route::resource('galleries', GalleryController::class)->except(['show']);
    Route::resource('messages', ContactController::class)
                ->only(['index', 'show', 'destroy'])
                ->parameters(['messages' => 'contact']);

    Route::get('/profile', [CompanyProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [CompanyProfileController::class, 'update'])->name('profile.update');
});

// PENGUNJUNG
Route::get('/', [PengunjungController::class, 'showHome'])->name('home');
Route::get('/about', [PengunjungController::class, 'showAbout'])->name('about');
Route::get('/news', [PengunjungController::class, 'showNews'])->name('news.index');
Route::get('/news/{slug}', [PengunjungController::class, 'showNewsDetail'])->name('news.show');

Route::get('/gallery', [PengunjungController::class, 'showGallery'])->name('gallery');

Route::get('/contact', [PengunjungController::class, 'showContact'])->name('contact');
Route::post('/contact', [PengunjungController::class, 'storeContact'])->name('contact.store');


Route::get('/login', function () {
    return view('auth.login');
});
