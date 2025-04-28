<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalians extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_barang','jumlah','tglkembali','nama_peminjam','id_peminjam','id_barang','created_at','updated_at'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(DataPusats::class, 'id_barang', 'id');
    }

    public function peminjam()
    {
        return $this->belongsTo(Peminjamans::class, 'id_peminjam', 'id');
    }
}
