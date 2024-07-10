<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\produkController;
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



Route::get('/', [authController::class, 'login'])->name('login');
Route::get('/register', [authController::class, 'register'])->name('register');
Route::get('/auth/register', [authController::class, 'prosesRegister'])->name('auth.register');
Route::get('/auth/login', [authController::class, 'prosesLogin'])->name('auth.login');
Route::middleware('auth')->group(function () {
    Route::get('/auth/logout', [authController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', [produkController::class, 'index'])->name('dashboard');
    Route::delete('/produk/hapus/{id}', [produkController::class, 'hapus'])->name('produk.hapus');
    Route::put('/produk/edit/{id}', [produkController::class, 'edit'])->name('produk.edit');
    Route::post('/produk/tambah', [produkController::class, 'tambah'])->name('produk.tambah');
    Route::get('/kategori',[kategoriController::class, 'index'])->name('kategori');
    Route::delete('/kategori/hapus/{id}', [kategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::put('/kategori/edit/{id}', [kategoriController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/tambah', [kategoriController::class, 'tambah'])->name('kategori.tambah');
});
