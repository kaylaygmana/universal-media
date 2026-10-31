<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\LoginControllerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route aplikasi didefinisikan di sini.Route::get('/kategori/{kategori}', [BeritaController::class, 'kategori'])->name('kategori.show');

*/

// Halaman utama menampilkan berita
Route::get('/', [BeritaController::class, 'index'])->name('berita.index');

// Halaman upload berita (form create)
// Route::get('/upload', [BeritaController::class, 'create'])->name('upload');

// Halaman single (menampilkan 1 berita terbaru)
Route::get('/single', [BeritaController::class, 'showLatest'])->name('single');

// Halaman kategori berita
Route::get('/kategori/{kategori}', [BeritaController::class, 'kategori'])->name('berita.kategori');

// Sidebar routes
Route::get('/sidebar', [SidebarController::class, 'index'])->name('sidebar.index');
Route::get('/sidebar/create', [SidebarController::class, 'create'])->name('sidebar.create');
Route::post('/sidebar', [SidebarController::class, 'store'])->name('sidebar.store');

Route::get('/login', [LoginController::class, 'showForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'proses'])->name('login.proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/asdasdasd', function () {
        $beritas = \App\Models\Berita::all();
        return view('partials.upload', compact('beritas'));
    })->name('upload.admin')->middleware('admin');

Route::get('/kategori/{kategori}', [BeritaController::class, 'kategori'])->name('kategori.show');
Route::resource('berita', BeritaController::class)
    ->parameters([
        'berita' => 'berita'
    ]);
