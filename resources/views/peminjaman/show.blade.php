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
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>

                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mt-2">Informasi Peminjaman</h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Kode Peminjaman</th>
                                        <td>: {{ $peminjaman->kode_barang }}</td>
                                    </tr>
                                     <tr>
                                        <th>Nama Barang</th>
                                        <td>: {{ $peminjaman->barang->nama}}</td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah</th>
                                        <td>: {{ $peminjaman->jumlah }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Peminjman</th>
                                        <td>: {{ $peminjaman->nama_peminjam }}</td>
                                    </tr>
                                     <tr>
                                        <th>Tanggal Pinjam</th>
                                        <td>: {{ $peminjaman->tglpinjam }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Kembali</th>
                                        <td>: {{ $peminjaman->tglkembali}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>: {{ $peminjaman->status}}</td>
                                    </tr>
                                   
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div> {{-- End Container --}}
 
