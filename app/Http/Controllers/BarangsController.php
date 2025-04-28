<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPusats;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $barangs = DataPusats::all();
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
            'foto' => 'required',
            'stok'  => 'required',
        ]);

        $barangs = new DataPusats();
        $barangs->kode_barang =          $request->kode_barang;
        $barangs->nama =                 $request->nama;
        $barangs->merk =                 $request->merk;

        if ($request->hasFile('foto')) {
            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName(); // Menggabungkan angka acak dengan nama file
            $img->move('images/barangs', $name); // Memindahkan file ke folder yang dituju
            $barangs->foto = $name; // Menyimpan nama file ke properti cover
        }   

        $barangs->stok =                 $request->stok;

        return redirect()->route('barang.index')->with('success', 'Data Barang berhasil ditambahkan');
       
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
