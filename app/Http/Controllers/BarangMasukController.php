<?php

namespace App\Http\Controllers;

use App\Models\BarangMasuks;
use App\Models\DataPusats;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangmasuk = BarangMasuks::all();
        return view('barangmasuk.index', compact('barangmasuk'));
    }

     public function export()
    {
        
    $masuk = BarangMasuks::all();

    $pdf = Pdf::loadView('barangmasuk.datamasuk_pdf', ['masuk' => $masuk]);
    return $pdf->download('laporan-data-masuk.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = DataPusats::all();
        return view('barangmasuk.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'tglmasuk' => 'required|date',
            'ket' => 'nullable|string',
            'id_barang' => 'required|exists:Data_Pusats,id',
        ],
        [
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tglmasuk.required' => 'Tanggal masuk tidak boleh kosong',
            'tglmasuk.date' => 'Format tanggal tidak valid',
            'ket.string' => 'Keterangan harus berupa teks',
            'id_barang.required' => 'ID Barang tidak boleh kosong',
            'id_barang.exists' => 'ID Barang tidak ditemukan',
        ]);

        $barangmasuk = new BarangMasuks();
        $lastRecord = BarangMasuks::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $kodeBarang = 'MSK-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $barangmasuk->kode_barang = $kodeBarang;

        $dataPusat = DataPusats::find($request->id_barang);
        $dataPusat->stok += $request->jumlah;
        $dataPusat->save();

        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->tglmasuk = $request->tglmasuk;
        $barangmasuk->ket = $request->ket;
        $barangmasuk->id_barang = $request->id_barang;


        $barangmasuk->save();

        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $barangmasuk = BarangMasuks::findorfail($id);
       $barangs = DataPusats::all();
       return view('barangmasuk.show', compact('barangmasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barangmasuk = BarangMasuks::findOrFail($id);
        $barangs = DataPusats::all();
        return view('barangmasuk.edit', compact('barangmasuk', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'tglmasuk' => 'required|date',
            'ket' => 'nullable|string',
            'id_barang' => 'required|exists:Data_Pusats,id',
        ],
        [
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tglmasuk.required' => 'Tanggal masuk tidak boleh kosong',
            'tglmasuk.date' => 'Format tanggal tidak valid',
            'ket.string' => 'Keterangan harus berupa teks',
            'ket.required' => 'Keterangan tidak boleh kosong',
            'id_barang.required' => 'ID Barang tidak boleh kosong',
            'id_barang.exists' => 'ID Barang tidak ditemukan',
        ]);

        $barangmasuk = BarangMasuks::findOrFail($id);
        $dataPusat = DataPusats::find($barangmasuk->id_barang);
        $dataPusat->stok -= $barangmasuk->jumlah;
        $dataPusat->stok += $request->jumlah;
        $dataPusat->save();

        $barangmasuk->jumlah = $request->jumlah;
        $barangmasuk->tglmasuk = $request->tglmasuk;
        $barangmasuk->ket = $request->ket;
        $barangmasuk->id_barang = $request->id_barang;

        $barangmasuk->save();

        Alert::success('Berhasil!', 'Barang Masuk berhasil diperbarui');
        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangmasuk = BarangMasuks::findOrFail($id);
        $dataPusat = DataPusats::find($barangmasuk->id_barang);
        $dataPusat->stok -= $barangmasuk->jumlah;
        $dataPusat->save();

        $barangmasuk->delete();

        alert()->success('Berhasil!', 'Barang Masuk berhasil dihapus');

        return redirect()->route('barangmasuk.index')->with('success', 'Barang Masuk berhasil dihapus');
    }
}
