@extends('layouts.app')

@section('content')
  
    <div>
        <br>
        <br>
    </div>
  
        <div class="container">
            <div class="page-inner">
                <div class="page-header d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold mb-3">Detail Barang</h3>
                    <a href="{{ route('barangmasuk.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mt-2">Informasi Barang</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Kode Barang</th>
                                        <td>: {{ $barangmasuk->kode_barang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>: {{ $barangmasuk->jumlah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Masuk</th>
                                        <td>: {{ $barangmasuk->tglmasuk }}</td>
                                    </tr>
                                     <tr>
                                        <th>Keterangan</th>
                                        <td>: {{ $barangmasuk->ket }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Barang</th>
                                        <td>: {{ $barangmasuk->barang->nama ?? 'Nama barang tidak ditemukan' }}</td>
                                    </tr>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div> {{-- End Container --}}
 
