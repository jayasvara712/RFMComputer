@extends('layouts.main')
@section('container')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Laporan</h1>
      </div>
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <h4>Data Laporan</h4>
            </div>

            <div class="card-body">
                <div class="card-body">

                    <ul class="nav nav-tabs justify-content-center" id="myTab6" role="tablist">
                      @if(auth()->user()->role == 'pemilik')
                      <li class="nav-item">
                        <a class="nav-link active text-center" id="karyawan-tab6" data-toggle="tab" href="#karyawan" role="tab" aria-controls="karyawan" aria-selected="true">
                          <span><i class="fas fa-user"></i></span> Karyawan</a>
                      </li>
                      @endif

                      <li class="nav-item">
                        <a class="nav-link text-center" id="barang-tab6" data-toggle="tab" href="#barang" role="tab" aria-controls="profile" aria-selected="false">
                          <span><i class="fas fa-boxes"></i></span> Barang</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-center" id="barang-masuk-tab6" data-toggle="tab" href="#barang-masuk" role="tab" aria-controls="contact" aria-selected="false">
                          <span><i class="fas fa-box-open"></i></span> Barang Masuk</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-center" id="barang-keluar-tab6" data-toggle="tab" href="#barang-keluar" role="tab" aria-controls="contact" aria-selected="false">
                          <span><i class="fas fa-truck-loading"></i></span> Barang Keluar</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-center" id="stok-tab6" data-toggle="tab" href="#stok" role="tab" aria-controls="contact" aria-selected="false">
                          <span><i class="fas fa-truck-loading"></i></span> Stock</a>
                      </li>
                    </ul>

                    <div class="tab-content tab-bordered" id="myTabContent6">

                      @if(auth()->user()->role == 'pemilik')
                      <div class="tab-pane fade show active" id="karyawan" role="tabpanel" aria-labelledby="karyawan">
                        <center>
                          <h2>Cetak Data Karyawan</h2>
                          <a href="/pemilik/cetak_karyawan" class="btn btn-primary">Cetak <i class="fas fa-print"></i></a>
                        </center>
                      </div>
                      @endif

                      <div class="tab-pane fade show" id="barang" role="tabpanel" aria-labelledby="barang">
                        <center>
                          <h2>Cetak Data Barang</h2>
                          <a href="/pemilik/cetak_barang" class="btn btn-primary">Cetak <i class="fas fa-print"></i></a>
                        </center>
                      </div>
                      <div class="tab-pane fade" id="barang-masuk" role="tabpanel" aria-labelledby="barang-masuk">
                        <h2>Cetak Data Barang Masuk</h2>
                        <form action="/pemilik/cetak_barang_masuk">
                          @csrf

                          <div class="form-group">
                            <label for="">Type</label>
                            <select name="tipe" id="pilihan" class="form-control" onchange="showVal()">
                              <option value="hari">Harian</option>
                              <option value="bulan">Bulanan</option>
                            </select>
                          </div>

                          <div class="form-group pilihan" id="pilhari">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" id="" class="form-control">
                          </div>

                          <div class="form-group pilihan" id="pilbulan">
                            <label for="">Bulan</label>
                            <input type="month" name="bulan" id="" class="form-control">
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button> 
                          </div>

                        </form>
                      </div>
                      <div class="tab-pane fade" id="barang-keluar" role="tabpanel" aria-labelledby="barang-keluar">
                        <h2>Cetak Data Barang Keluar</h2>
                        <form action="/pemilik/cetak_barang_keluar">
                          @csrf

                          <div class="form-group">
                            <label for="">Type</label>
                            <select name="tipe" id="pilihan2" class="form-control" onchange="showVal2()">
                              <option value="hari">Harian</option>
                              <option value="bulan">Bulanan</option>
                            </select>
                          </div>

                          <div class="form-group pilihan" id="pilhari2">
                            <label for="">Tanggal</label>
                            <input type="date" name="tanggal" id="" class="form-control">
                          </div>

                          <div class="form-group pilihan" id="pilbulan2">
                            <label for="">Bulan</label>
                            <input type="month" name="bulan" id="" class="form-control">
                          </div>

                          <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i> Cetak</button> 
                          </div>

                        </form>
                      </div>

                      <div class="tab-pane fade show" id="stok" role="tabpanel" aria-labelledby="stok">
                        <center>
                          <h2>Cetak Data Stock Barang</h2>
                          <a href="/pemilik/cetak_stok" class="btn btn-primary">Cetak <i class="fas fa-print"></i></a>
                        </center>
                      </div>
                      
                    </div>
                    
                </div><!-- /.container-fluid -->

            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
    
@endsection