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
use PDF;


class LaporanControllers extends Controller
{
    public function index()
    {
        return view('laporan.index', [
            'title' => 'Laporan',
            'user'  => User::all(),
            'satuan'    => Satuan::all(),
            'jenis'     => Jenis::all(),
            'barang'    => Barang::all(),
            'stok'          => Stock::all(),
            'barang_masuk'  => BarangMasuk::all(),
            'barang_keluar' => BarangKeluar::all(),
        ]);
    }

    public function cetak_karyawan()
    {
        $user = User::where('role', 'admin')->get();
        $title = 'Data Karyawan | RFM Computer';
        $date = date('d M Y');

        $pdf = PDF::loadView('laporan.cetak_karyawan', ['user' => $user, 'title' => $title, 'date' => $date]);
        return $pdf->download('laporan-karyawan.pdf');
    }

    public function cetak_barang()
    {
        $barang = Barang::all();
        $title = 'Data Barang | RFM Computer';
        $date = date('d M Y');

        $pdf = PDF::loadView('laporan.cetak_barang', ['barang' => $barang, 'title' => $title, 'date' => $date]);
        return $pdf->download('laporan-barang.pdf');
    }

    public function cetak_barang_masuk(Request $request)
    {
        $input = $request->tipe;
        $hari = $request->tanggal;
        $bulan = explode('-', $request->bulan, 2);
        $title = 'Data Barang Masuk | RFM Computer';
        $subjudul1 = 'Data Barang Masuk Harian';
        $subjudul2 = 'Data Barang Masuk Bulanan';
        $date = date('d M Y');

        if ($input == 'hari') {
            $barang_masuk = BarangMasuk::whereDate('tanggal_masuk', $hari)->get();
            $pdf = PDF::loadView('laporan.cetak_barang_masuk', ['barang_masuk' => $barang_masuk, 'title' => $title, 'subjudul' => $subjudul1, 'date' => $date]);
            return $pdf->download('laporan-barang-masuk-harian.pdf');
        } else if ($input == 'bulan') {
            $barang_masuk = BarangMasuk::whereMonth('tanggal_masuk', $bulan[1])->whereYear('tanggal_masuk', $bulan[0])->get();
            $pdf = PDF::loadView('laporan.cetak_barang_masuk', ['barang_masuk' => $barang_masuk, 'title' => $title, 'subjudul' => $subjudul2, 'date' => $date]);
            return $pdf->download('laporan-barang-masuk-bulanan.pdf');
        }
    }

    public function cetak_barang_keluar(Request $request)
    {
        $input = $request->tipe;
        $hari = $request->tanggal;
        $bulan = explode('-', $request->bulan, 2);
        $title = 'Data Barang Keluar | RFM Computer';
        $subjudul1 = 'Data Barang Keluar Harian';
        $subjudul2 = 'Data Barang Keluar Bulanan';
        $date = date('d M Y');

        if ($input == 'hari') {
            $barang_keluar = BarangKeluar::whereDate('tanggal_keluar', $hari)->get();
            $pdf = PDF::loadView('laporan.cetak_barang_keluar', ['barang_keluar' => $barang_keluar, 'title' => $title, 'subjudul' => $subjudul1, 'date' => $date]);
            return $pdf->download('laporan-barang-keluar-harian.pdf');
        } else if ($input == 'bulan') {
            $barang_keluar = BarangKeluar::whereMonth('tanggal_keluar', $bulan[1])->whereYear('tanggal_keluar', $bulan[0])->get();
            $pdf = PDF::loadView('laporan.cetak_barang_keluar', ['barang_keluar' => $barang_keluar, 'title' => $title, 'subjudul' => $subjudul2, 'date' => $date]);
            return $pdf->download('laporan-barang-keluar-bulanan.pdf');
        }
    }

    public function cetak_stok()
    {
        $stok = Stock::all();
        $title = 'Data Barang Keluar | RFM Computer';
        $date = date('d M Y');

        $pdf = PDF::loadView('laporan.cetak_stok', ['stok' => $stok, 'title' => $title, 'date' => $date]);
        return $pdf->download('laporan-stok.pdf');
    }
}
