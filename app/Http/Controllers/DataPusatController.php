<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPusats;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

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
            
            'nama' => 'required',
            'merk' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:9999',
            'stok' => 'required',
        ],
        [
            'nama.required' => 'Nama tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar tidak valid',
            'foto.max' => 'Ukuran gambar terlalu besar',
            'stok.required' => 'Stok tidak boleh kosong',
        ]
    
    );




        $barangs = new DataPusats();


        $lastRecord = DataPusats::latest('id')->first();
        $lastId = $lastRecord ? $lastRecord->id : 0;
        $kodeBarang = 'SKV-' . str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);
        $barangs->kode_barang = $kodeBarang;
        
       
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
            'nama' => 'required',
            'merk' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:9999',
            'stok' => 'required',
        ],
        [
            'nama.required' => 'Nama tidak boleh kosong',
            'merk.required' => 'Merk tidak boleh kosong',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar tidak valid',
            'foto.max' => 'Ukuran gambar terlalu besar',
            'stok.required' => 'Stok tidak boleh kosong',
        ]
    
    );


        $barangs = DataPusats::findorfail($id);

    
        $barangs->nama = $request->nama;
        $barangs->merk = $request->merk;
        
        
        if ($request->hasFile('foto')) {
 
            $fotoLama = $barangs->foto;
            if ($fotoLama && file_exists(public_path('images/foto/barangs/' . $fotoLama))) {
                unlink(public_path('images/foto/barangs/' . $fotoLama));
            }

            $img = $request->file('foto');
            $name = rand(1000, 9999) . $img->getClientOriginalName();
            $img->move(public_path('images/foto/barangs'), $name);
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

        if ($barangs->foto && File::exists(public_path('images/barangs/' . $barangs->foto))) {
            File::delete(public_path('images/barangs/' . $barangs->foto));
        }

        $barangs->delete();
        return redirect()->route('barang.index')->with('success', 'Data Barang Berhasil Dihapus');
    }
}
