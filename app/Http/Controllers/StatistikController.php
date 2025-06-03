<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function getData()
    {
        // Contoh query, sesuaikan dengan tabel dan logika kamu
        $barangDipinjam = DB::table('peminjamans')->count();
        $datapusat = DB::table('data_pusats')->count();
        $barangMasuk = DB::table('barang_masuks')->count();
        $barangKeluar = DB::table('barang_keluars')->count();

        return response()->json([
            'barangDipinjam' => $barangDipinjam,
            'datapusat' => $datapusat,
            'barangMasuk' => $barangMasuk,
            'barangKeluar' => $barangKeluar,
        ]);
    }
}
