<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangKeluar;
use App\Models\DataPusats;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.   
     */
    public function index()
    {
        // Display a listing of the resource
        $barangkeluar = BarangKeluar::all();
        return view('barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barangs = DataPusats::all();
        return view('barangkeluar.create', compact('barangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $barangkeluar = new BarangKeluar();

      
       $request->validate([
            'jumlah' => 'required|integer',
            'tglkeluar' => 'required|date',
            'ket' => 'nullable|string',
            'id_barang' => 'required|exists:Data_Pusats,id',
        ],
        [
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tglkeluar.required' => 'Tanggal masuk tidak boleh kosong',
            'tglkeluar.date' => 'Format tanggal tidak valid',
            'ket.string' => 'Keterangan harus berupa teks',
            'id_barang.required' => 'ID Barang tidak boleh kosong',
            'id_barang.exists' => 'ID Barang tidak ditemukan',
        ]);

        $barangkeluar = new BarangKeluar();
        $lastRecord = BarangKeluar::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $kodeBarang = 'KLR-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $barangkeluar->kode_barang = $kodeBarang;

        $dataPusat = DataPusats::find($request->id_barang);
        $dataPusat->stok += $barangkeluar->jumlah;
        $dataPusat->save();
        

        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->tglkeluar = $request->tglkeluar;
        $barangkeluar->ket = $request->ket;
        $barangkeluar->id_barang = $request->id_barang;

        $pusat = DataPusats::findOrFail($request->id_barang);
        if ($pusat->stok < $request->jumlah) {
            Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
            return redirect()->route('barangkeluar.index');
        } else {
            $pusat->stok -= $request->jumlah;
            $pusat->save();
        }

        $barangkeluar->save();
        return redirect()->route('barangkeluar.index')->with('success', 'Barang Keluar berhasil ditambahkan');
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
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangs = DataPusats::all();
        return view('barangkeluar.edit', compact('barangkeluar', 'barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'jumlah' => 'required|integer',
            'tglkeluar' => 'required|date',
            'ket' => 'nullable|string',
            'id_barang' => 'required|exists:Data_Pusats,id',
        ],
        [
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tglkeluar.required' => 'Tanggal masuk tidak boleh kosong',
            'tglkeluar.date' => 'Format tanggal tidak valid',
            'ket.string' => 'Keterangan harus berupa teks',
            'id_barang.required' => 'ID Barang tidak boleh kosong',
            'id_barang.exists' => 'ID Barang tidak ditemukan',
        ]);

        $barangkeluar = BarangKeluar::findOrFail($id);
        $dataPusat = DataPusats::find($barangkeluar->id_barang);
        $dataPusat->stok += $barangkeluar->jumlah;
        $dataPusat->stok -= $request->jumlah;
        
        $dataPusat->save();

        $barangkeluar->jumlah = $request->jumlah;
        $barangkeluar->tglkeluar = $request->tglkeluar;
        $barangkeluar->ket = $request->ket;
        $barangkeluar->id_barang = $request->id_barang;



             $pusat = DataPusats::findOrFail($request->id_barang);
        if ($pusat->stok < $request->jumlah) {
            Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
            return redirect()->route('barangkeluar.index');
        } else {
            $pusat->stok -= $request->jumlah;
            $pusat->save();
        }



        $barangkeluar->save();

        Alert::success('Berhasil!', 'Barang Masuk berhasil diperbarui');
        return redirect()->route('barangkeluar.index')->with('success', 'Barang Masuk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangkeluar = BarangKeluar::findOrFail($id);
        $barangkeluar->delete();

        Alert::success('Berhasil!', 'Data Barang Keluar Berhasil Dihapus');
        return redirect()->route('barangkeluar.index')->with('success', 'Data Barang Keluar Berhasil Dihapus');
    }
}
