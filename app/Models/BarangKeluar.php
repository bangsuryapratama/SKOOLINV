<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barangs;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_barang','jumlah','tglkeluar','ket','id_barang','created_at','updated_at'];
    public $timestamps = true;
    
    public function barang()
    {
        return $this->belongsTo(DataPusats::class, 'id_barang', 'id');
    }
}
