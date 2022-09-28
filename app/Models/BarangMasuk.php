<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk';
    protected $primaryKey = 'id_barang_masuk';

    protected $fillable = [
        'id_user', 'id_barang', 'jumlah_masuk', 'tanggal_masuk'
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang', 'id_barang');
    }
}
