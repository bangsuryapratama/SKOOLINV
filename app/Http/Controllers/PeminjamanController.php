<?php

namespace App\Http\Controllers;

use App\Models\DataPusats;
use App\Models\Peminjaman;
use App\Models\Peminjamans;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

Carbon::setlocale('id');

class PeminjamanController extends Controller
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
    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');

    if (!$tanggalAwal || !$tanggalAkhir) {
        $pinjam = Peminjamans::where('status', 'Sedang Dipinjam')->get();
    } else {
        $pinjam = Peminjamans::where('status', 'Sedang Dipinjam')
            ->whereBetween('tglpinjam', [$tanggalAwal, $tanggalAkhir])
            ->get();
    }

    foreach ($pinjam as $data) {
        $data->formatted_tanggal_pinjam = Carbon::parse($data->tglpinjam)->translatedFormat('l, d F Y');
        $data->formatted_tanggal_kembali = Carbon::parse($data->tglkembali)->translatedFormat('l, d F Y');
    }

    return view('peminjaman.index', compact('pinjam'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pusat = DataPusats::all();
        return view('peminjaman.create', compact('pusat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'jumlah' => 'required|integer',
            'tglpinjam' => 'required|date',
            'tglkembali' => 'required|date',
            'nama_peminjam' => 'required|string|max:255',
            'id_barang' => 'required|exists:data_pusats,id',
        ],
        [
            'jumlah.required' => 'Jumlah tidak boleh kosong',
            'jumlah.integer' => 'Jumlah harus berupa angka',
            'tglpinjam.required' => 'Tanggal pinjam tidak boleh kosong',
            'tglpinjam.date' => 'Format tanggal tidak valid',
            'tglkembali.required' => 'Tanggal kembali tidak boleh kosong',
            'tglkembali.date' => 'Format tanggal tidak valid',
            'nama_peminjam.required' => 'Nama peminjam tidak boleh kosong',
            'id_barang.required' => 'ID Barang tidak boleh kosong',
            'id_barang.exists' => 'ID Barang tidak ditemukan',
        ]);


        $pinjam = new Peminjamans;

        $lastRecord = Peminjamans::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $kodeBarang = 'PJM-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        $pinjam->kode_barang = $kodeBarang;
        $pinjam->jumlah = $request->jumlah;
        $pinjam->tglpinjam = $request->tglpinjam;
        $pinjam->tglkembali = $request->tglkembali;
        $pinjam->nama_peminjam = $request->nama_peminjam;
        $pinjam->id_barang = $request->id_barang;
        $pinjam->status = "Sedang Dipinjam";

        $pusat = DataPusats::findOrFail($request->id_barang);
        if ($pusat->stok < $request->jumlah) {
            Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
            return redirect()->route('peminjaman.index');
        } else {
            $pusat->stok -= $request->jumlah;
            $pusat->save();
        }

        $pinjam->save();
       
        return redirect()->route('peminjaman.index') ->with('success', 'Data Peminjaman Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjamans::findOrFail($id);
        $barang = DataPusats::All();
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam = Peminjamans::findOrFail($id);
        $pusat = DataPusats::all();
        return view('peminjaman.edit', compact('pinjam', 'pusat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pinjam = Peminjamans::findOrFail($id);
        $pusat = DataPusats::findOrFail($pinjam->id_barang);

        // status pengembalian
        if ($request->status == "Sudah Dikembalikan") {
            $pusat->stok += $pinjam->jumlah;
            $pusat->save();
        }

        //logic perubahan ketika update
        if ($pusat->stok < $request->jumlah) {
            Alert::warning('Warning', 'Stok Tidak Cukup')->autoClose(1500);
            return redirect()->route('peminjaman.index');
        } else {
            $pusat->stok += $pinjam->jumlah;
            $pusat->stok -= $request->jumlah;
            $pusat->save();
        }

        $pinjam->update($request->all());

        $pinjam->save();
       
        return redirect()->route('peminjaman.index') ->with('success', 'Data Peminjaman Berhasil Diperbarui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pinjam = Peminjamans::findOrFail($id);
        $pinjam->delete();
        Alert::success('Success', 'Data Berhasil Dihapus')->autoclose(1500);
        return redirect()->route('peminjaman.index');
    }
}