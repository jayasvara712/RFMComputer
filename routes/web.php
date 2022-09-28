<?php

use App\Http\Controllers\AjaxControllers;
use App\Http\Controllers\BarangControllers;
use App\Http\Controllers\BarangKeluarControllers;
use App\Http\Controllers\BarangMasukControllers;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\JenisControllers;
use App\Http\Controllers\KaryawanControllers;
use App\Http\Controllers\LaporanControllers;
use App\Http\Controllers\LoginControllers;
use App\Http\Controllers\SatuanControllers;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SettingControllers;
use App\Http\Controllers\StockControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', DashboardControllers::class)->middleware('auth');
// Route::resource('/admin', DashboardControllers::class)->middleware('admin');
// Route::resource('/pemilik', DashboardControllers::class)->middleware('pemilik');

// Route::resource('/admin/user', );
//Role Admin
Route::delete('/admin/jenis/destroy/{id}', [JenisControllers::class, 'destroy'])->name('jenis.destroy');
Route::resource('/admin/jenis', JenisControllers::class)->middleware('admin');
Route::resource('/admin/satuan', SatuanControllers::class)->middleware('admin');
Route::resource('/admin/barang', BarangControllers::class)->middleware('admin');
Route::resource('/admin/barang_keluar', BarangKeluarControllers::class)->middleware('admin');
Route::resource('/admin/barang_masuk', BarangMasukControllers::class)->middleware('admin');
Route::resource('/admin/stock', StockControllers::class)->middleware('admin');
Route::resource('/admin/laporan', LaporanControllers::class)->middleware('admin');
Route::resource('/admin/setting', SettingControllers::class)->middleware('admin');

//Role Pemilik
Route::resource('/pemilik/karyawan', KaryawanControllers::class)->middleware('pemilik');
Route::resource('/pemilik/laporan', LaporanControllers::class)->middleware('pemilik');

//Cetak Laporan
Route::get('/pemilik/cetak_karyawan', [LaporanControllers::class, 'cetak_karyawan']);
Route::get('/pemilik/cetak_barang', [LaporanControllers::class, 'cetak_barang']);
Route::get('/pemilik/cetak_barang_masuk', [LaporanControllers::class, 'cetak_barang_masuk']);
Route::get('/pemilik/cetak_barang_keluar', [LaporanControllers::class, 'cetak_barang_keluar']);
Route::get('/pemilik/cetak_stok', [LaporanControllers::class, 'cetak_stok']);

//AJAX
Route::get('/ajaxRequest', [AjaxControllers::class, 'ajaxRequest']);
Route::post('/ajaxRequest/{id}', [AjaxControllers::class, 'ajaxRequestPost'])->name('ajaxRequest.post');

//Login
Route::get('/login', [LoginControllers::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginControllers::class, 'authenticate']);
Route::post('/logout', [LoginControllers::class, 'logout']);
