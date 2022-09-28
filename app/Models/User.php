<?php

namespace App\Models;

use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'username',
        'email',
        'password',
        'no_telp',
        'role',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
    public function barang_kelaur()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
