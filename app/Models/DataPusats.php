<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class DataPusats extends Model
{
    use HasFactory;
    protected $fillable = ['id','kode_barang','nama','merk','foto','stok','created_at','updated_at'];
    public $timestamp = true;
    
    public function barangMasuks()
    {
        return $this->hasMany(BarangMasuks::class, 'id_barang', 'id');
    }

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class, 'id_barang', 'id');  
    }

    public function peminjamans()
    {
        return $this->hasMany(Peminjamans::class, 'id_barang', 'id');
    }

    //kode barang otomatis
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->kode_barang = 'BRG' .  strtoupper(Str::random(5)); ;
        });
    }

}
