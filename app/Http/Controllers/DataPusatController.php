<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPusats;
use RealRashid\SweetAlert\Facades\Alert;

class DataPusatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = DataPusats::all();
        Alert::warning('Hapus Data!', 'Apakah Anda Yakin?');
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'merk' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:9999',
            'stok' => 'required',
        ]);


        $barangs = new DataPusats();

        $barangs->kode_barang = $request->kode_barang;
        $barangs->nama = $request->nama;
        $barangs->merk = $request->merk;
        

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/barangs', $name);
            $barangs->foto = $name;
        }

        $barangs->stok = $request->stok;
        $barangs->save();
        Alert::success('Berhasil!', 'Data Barang Berhasil Ditambahkan');

    return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Ditambahkan');
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
        $barangs = DataPusats::FindOrFail($id);
        return view('barang.edit' , compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required',
            'nama' => 'required',
            'merk' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:9999',
            'stok' => 'required',
        ]);


        $barangs = DataPusats::findorfail($id);

        $barangs->kode_barang = $request->kode_barang;
        $barangs->nama = $request->nama;
        $barangs->merk = $request->merk;
        

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move('images/barangs', $name);
            $barangs->foto = $name;
        }

        $barangs->stok = $request->stok;
        $barangs->save();
        Alert::success('Berhasil!', 'Data Barang Berhasil Ditambahkan');

    return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil DiUpdate!!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barangs = DataPusats::findOrFail($id);
        $barangs->delete();
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Dihapus');
    }
}
