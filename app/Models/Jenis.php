<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;

    protected $table = 'jenis';
    protected $primaryKey = 'id_jenis';
    
    protected $fillable = [
        'id_jenis','nama_jenis',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
