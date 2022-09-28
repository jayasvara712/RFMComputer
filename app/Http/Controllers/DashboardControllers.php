<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jenis;
use App\Models\Stock;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardControllers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'user'  => User::count(),
            'satuan'    => Satuan::count(),
            'jenis'     => Jenis::count(),
            'barang'    => Barang::count(),
            'stock'    => Stock::count(),
            'barang_masuk'  => BarangMasuk::count(),
            'barang_keluar' => BarangKeluar::count(),
        ]);
    }
}
