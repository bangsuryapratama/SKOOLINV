<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjamans extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_barang','jumlah','tglpinjam','tglkembali','nama_peminjam','status','id_barang','created_at','updated_at'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(DataPusat::class, 'id_barang', 'id');
    }
    
    public function pengembalian()
    {
        return $this->hasOne(Pengembalians::class, 'id_peminjam', 'id');
    }
}
