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
                    <a href="{{ route('barang.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
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
                                        <td>: {{ $barangs->kode_barang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>: {{ $barangs->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Merk</th>
                                        <td>: {{ $barangs->merk }}</td>
                                    </tr>
                                    <tr>
                                        <th>Foto</th>
                                        <td>:
                                            <img src="{{ asset('/images/barangs/' . $barangs->foto) }}" width="100" alt="Foto Barang">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Stok</th>
                                        <td>: {{ $barangs->stok }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </div> {{-- End Container --}}
 
