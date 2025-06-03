<?php

namespace App\Http\Controllers;

use App\Models\DataPusats;
use App\Models\Peminjamans;
use App\Models\Pengembalians;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;

Carbon::setLocale('id');

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
     {
        $pengembalian = Peminjamans::where('status', 'Sudah Dikembalikan')->get();
        return view('pengembalian.index', compact('pengembalian'));
    }

     public function export()
    {
        
      $pengembalian = Peminjamans::with('barang')->where('status', 'Sudah Dikembalikan')->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pengembalian.pengembalian_pdf', compact('pengembalian'));
        $pdf->setPaper('A4', 'landscape'); 
        return $pdf->download('data-pengembalian.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // Validasi request
    $request->validate([
        'peminjaman_id' => 'required|exists:peminjamans,id',
    ]);

    // Ambil data peminjaman
    $peminjaman = Peminjamans::findOrFail($request->peminjaman_id);

    // Cek dulu apakah sudah dikembalikan
    if ($peminjaman->status === 'Sudah Dikembalikan') {
        return redirect()->back()->with('error', 'Barang ini sudah dikembalikan.');
    }

    // Update status peminjaman
    $peminjaman->status = 'Sudah Dikembalikan';
    $peminjaman->tglkembali = Carbon::now();
    $peminjaman->save();

    // Tambahkan ke tabel pengembalians
    Pengembalians::create([
        'peminjaman_id' => $peminjaman->id,
        'kodebarang' => $peminjaman->kodebarang,
        'namabarang' => $peminjaman->namabarang,
        'peminjam' => $peminjaman->peminjam,
        'jumlah' => $peminjaman->jumlah,
        'tglkembali' => $peminjaman->tglkembali,
    ]);

    // Update stok barang di pusat (opsional)
    $pusat = DataPusats::where('kodebarang', $peminjaman->kodebarang)->first();
    if ($pusat) {
        $pusat->stok += $peminjaman->jumlah;
        $pusat->save();
    }

    return redirect()->route('pengembalian.index')->with('success', 'Barang berhasil dikembalikan dan data disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(Pengembalians $pengembalian)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengembalians $pengembalian)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengembalians $pengembalian)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjamans $pengembalian)
    {
        $pengembalian->delete();
        session()->flash('success', 'Data Berhasil Dihapus');
        return redirect()->route('pengembalian.index');
    }
}