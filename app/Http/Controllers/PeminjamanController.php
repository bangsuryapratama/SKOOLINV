<?php

namespace App\Http\Controllers;

use App\Models\DataPusats;
use Illuminate\Http\Request;
use App\Models\Peminjamans;
use RealRashid\SweetAlert\Facades\Alert;

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

    $request->validate([
        'jumlah' => 'required',
        'tglpinjam' => 'required',
        'tglkembali' => 'required',
        'nama_peminjam' => 'required',
        'id_barang' => 'required',
    ], [
        'jumlah.required' => 'Jumlah Harus Diisi',
        'tglpinjam.required' => 'Tanggal Pinjam Harus Diisi',
        'tglkembali.required' => 'Tanggal Kembali Harus Diisi',
        'nama_peminjam.required' => 'Nama Peminjam Harus Diisi',
        'id_barang.required' => 'Barang Harus Diisi',
    ]);

    $peminjaman = new Peminjamans();

    $lastRecord = Peminjamans::latest('id')->first();
    $lastId = $lastRecord ? $lastRecord->id : 0;
    $kodeBarang = 'PJM-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

    $peminjaman->kode_barang = $kodeBarang;

    $peminjaman->jumlah = $request->jumlah;
    $peminjaman->tglpinjam = $request->tglpinjam;
    $peminjaman->tglkembali = $request->tglkembali;
    $peminjaman->nama_peminjam = $request->nama_peminjam;
    $peminjaman->id_barang = $request->id_barang;
    $peminjaman->status = "Sedang Dipinjam";

    $barangs = DataPusats::findOrFail($request->id_barang);
    if ($barangs->stok < $request->jumlah) {
        Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
        return redirect()->route('peminjaman.index');
    } else {
        $barangs->stok -= $request->jumlah;
        $barangs->save();
    }

    

    $peminjaman->save();
    Alert::success('Success', 'Data Berhasil Ditambahkan')->autoclose(1500);
    return redirect()->route('peminjaman.index');
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
        $peminjaman = Peminjamans::findOrFail($id);
        $barangs = DataPusats::all();
        return view('peminjaman.edit', compact('peminjaman', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah' => 'required',
            'tglpinjam' => 'required',
            'tglkembali' => 'required',
            'nama_peminjam' => 'required',
            'id_barang' => 'required',
        ], [
            'jumlah.required' => 'Jumlah Harus Diisi',
            'tglpinjam.required' => 'Tanggal Pinjam Harus Diisi',
            'tglkembali.required' => 'Tanggal Kembali Harus Diisi',
            'nama_peminjam.required' => 'Nama Peminjam Harus Diisi',
            'id_barang.required' => 'Barang Harus Diisi',
        ]);

        $peminjaman = Peminjamans::findOrFail($id);
        $barangs = DataPusats::findOrFail($peminjaman->id_barang);

        // status pengembalian
        if ($request->status == "Sudah Dikembalikan") {
            $peminjaman->stok += $peminjaman->jumlah;
            $peminjaman->save();
        }

        //logic perubahan ketika update
        if ($barangs->stok < $request->jumlah) {
            Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
            return redirect()->route('peminjaman.index');
        } else {
            $barangs->stok += $peminjaman->jumlah;
            $barangs->stok -= $request->jumlah;
            $barangs->save();
        }

        $peminjaman->update($request->all());

        $peminjaman->save();
        Alert::success('Success', 'Data Berhasil Diubah')->autoclose(1500);
        return redirect()->route('peminjaman.index');

            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
