<?php

namespace App\Http\Controllers;

use App\Models\DataPusats;
use Illuminate\Http\Request;
use App\Models\Peminjamans;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Display a listing of the resource
        $peminjaman = Peminjamans::all();
        return view('peminjaman.index' , compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = DataPusats::all();
        $peminjamans = Peminjamans::all();
        return view('peminjaman.create', compact('barangs', 'peminjamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        // Create a new peminjaman
        $peminjaman = new Peminjamans();
        $lastRecord = Peminjamans::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $kodeBarang = 'PNJM-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $peminjaman->kode_barang = $kodeBarang;
        $peminjaman->nama_peminjam = $request->input('nama_peminjam');
        $peminjaman->id_barang = $request->input('id_barang');
        $peminjaman->jumlah = $request->input('jumlah');
        $peminjaman->tglpinjam = $request->input('tglpinjam');
        $peminjaman->tglkembali = $request->input('tglkembali');
        $peminjaman->status = $request->input('status', 'pending'); 
        

    dd($peminjaman);

        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
