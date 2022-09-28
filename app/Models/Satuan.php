<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuan';
    protected $primaryKey = 'id_satuan';

    protected $fillable = [
        'nama_satuan'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
