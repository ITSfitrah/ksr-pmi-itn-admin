<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\BarangController; 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin/berita', [BeritaController::class, 'index'])->middleware(['auth', 'verified'])->name('berita.index');
Route::post('/admin/berita', [BeritaController::class, 'store'])->middleware(['auth', 'verified'])->name('berita.store');
Route::get('/admin/berita/tambah', [BeritaController::class, 'create'])->middleware(['auth', 'verified'])->name('berita.create');
Route::get('/admin/berita/{id}/edit', [BeritaController::class, 'edit'])->middleware(['auth', 'verified'])->name('berita.edit');
Route::put('/admin/berita/{id}', [BeritaController::class, 'update'])->middleware(['auth', 'verified'])->name('berita.update');
require __DIR__.'/auth.php';


// Rute Inventaris Barang
Route::get('/admin/inventaris/barang', [BarangController::class, 'index'])->middleware(['auth', 'verified'])->name('barang.index');
Route::get('/admin/inventaris/barang/tambah', [BarangController::class, 'create'])->middleware(['auth', 'verified'])->name('barang.create');
Route::post('/admin/inventaris/barang', [BarangController::class, 'store'])->middleware(['auth', 'verified'])->name('barang.store');
Route::get('/admin/inventaris/barang/{id}/edit', [BarangController::class, 'edit'])->middleware(['auth', 'verified'])->name('barang.edit');
Route::put('/admin/inventaris/barang/{id}', [BarangController::class, 'update'])->middleware(['auth', 'verified'])->name('barang.update');
Route::delete('/admin/inventaris/barang/{id}', [BarangController::class, 'destroy'])->middleware(['auth', 'verified'])->name('barang.destroy');