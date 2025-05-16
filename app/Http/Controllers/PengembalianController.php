<?php

namespace App\Http\Controllers;


use App\Models\Peminjamans;
use App\Models\Pengembalians;
use Illuminate\Http\Request;
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
        $tanggalAwal = $request->input('tanggal_awal');
        $tanggalAkhir = $request->input('tanggal_akhir');

        if (!$tanggalAwal || !$tanggalAkhir) {
            $pengembalian = Peminjamans::where('status', 'Sudah Dikembalikan')->get();
        } else {
            $pengembalian = Peminjamans::where('status', 'Sudah Dikembalikan')
                ->whereBetween('tgl_kembali', [$tanggalAwal, $tanggalAkhir])
                ->get();
        }

        foreach ($pengembalian as $data) {
            $data->formatted_tanggal = Carbon::parse($data->tgl_kembali)->translatedFormat('l, d F Y');
        }

        return view('pengembalian.index', compact('pengembalian'));
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