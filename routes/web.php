<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PenggunasController;
use App\Http\Controllers\BarangsController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;

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
    return view('welcome');
})->name('welcome')->middleware('auth');

Auth::routes();

// Route Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route Pengguna
Route::get('/pengguna', [PenggunasController::class, 'index'])->name('pengguna.index');
Route::resource('pengguna', PenggunasController::class);
        

//Route AKSES BLOKIR
Route::middleware('admin')->group(function () {
    Route::get('/pengguna', [PenggunasController::class, 'index'])->name('pengguna.index');
    Route::resource('pengguna', PenggunasController::class);
});

//Route Barang
Route::get('/barang', [App\Http\Controllers\BarangsController::class, 'index'])->name('barang.index');
Route::resource('barang', App\Http\Controllers\BarangsController::class);

//Route Barang Masuk
Route::get('/barangmasuk', [App\Http\Controllers\BarangMasuController::class, 'index'])->name('barangmasuk.index');
Route::resource('barangmasuk', App\Http\Controllers\BarangMasuController::class);

//Route Barang Keluar
Route::get('/barangkeluar', [App\Http\Controllers\BarangKeluarController::class, 'index'])->name('barangkeluar.index');
Route::resource('barangkeluar', App\Http\Controllers\BarangKeluarController::class);

//Peminjaman
Route::get('/peminjaman', [App\Http\Controllers\PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::resource('peminjaman', App\Http\Controllers\PeminjamanController::class);

//Pengembalian
Route::get('/pengembalian', [App\Http\Controllers\PengembalianController::class, 'index'])->name('pengembalian.index');
Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);