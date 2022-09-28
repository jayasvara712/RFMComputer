<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_barang', 'kode_barang', 'nama_barang', 'id_jenis', 'id_satuan', 'gambar',
    ];

    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'id_jenis', 'id_jenis');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan', 'id_satuan');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function barang_keluar()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
