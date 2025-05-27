<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PenggunasController;
use App\Http\Controllers\DataPusatController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Models\DataPusats;

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
    $barangs = DataPusats::all();
    return view('welcome', compact('barangs'));
})->name('welcome')->middleware('auth');

Auth::routes();

// Route Home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Route AKSES BLOKIR
Route::middleware('is_admin')->group(function () {
    Route::resource('pengguna', PenggunasController::class);
});

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    
Route::resource('pengguna', PenggunasController::class);  
Route::get('petugas-export', [PenggunasController::class, 'export'])->name('petugas.export');



//Route Barang
Route::resource('barang', App\Http\Controllers\DataPusatController::class);
Route::get('datapusat-export', [DataPusatController::class, 'export'])->name('datapusat.export');

//Route Barang Masuk
Route::resource('barangmasuk', App\Http\Controllers\BarangMasukController::class);
Route::get('barangmasuk-export', [BarangMasukController::class, 'export'])->name('barangmasuk.export');

//Route Barang Keluar
Route::resource('barangkeluar', App\Http\Controllers\BarangKeluarController::class);
Route::get('barangkeluar-export', [BarangKeluarController::class, 'export'])->name('barangkeluar.export');

//Peminjaman
Route::resource('peminjaman', App\Http\Controllers\PeminjamanController::class);
Route::get('peminjaman-export', [PeminjamanController::class, 'export'])->name('peminjaman.export');

//Pengembalian
Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);
Route::get('pengembalian-export', [PengembalianController::class, 'export'])->name('pengembalian.export');



});

