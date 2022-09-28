@extends('layouts.main')
@section('container')

@if (session()->has('success'))
  <div id="success" style="visibility: hidden">
      {{ session('success') }}
  </div>
@endif

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Dashboard</h1>
      </div>
      <div class="row">

        @if(auth()->user()->role == 'pemilik')
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Karyawan</h4>
              </div>
              <div class="card-body">
                {{ $user }}
              </div>
            </div>
          </div>
        </div>
        @endif

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-info"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jenis</h4>
              </div>
              <div class="card-body">
                {{ $jenis }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-ellipsis-v"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Satuan</h4>
              </div>
              <div class="card-body">
                {{ $satuan }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-boxes"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Barang</h4>
              </div>
              <div class="card-body">
                {{ $barang }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-cubes"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Stock</h4>
              </div>
              <div class="card-body">
                {{ $stock }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-box-open"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Barang Masuk</h4>
              </div>
              <div class="card-body">
                {{ $barang_masuk }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-truck-loading"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Barang Keluar</h4>
              </div>
              <div class="card-body">
                {{ $barang_keluar }}
              </div>
            </div>
          </div>
        </div>

      </div>
      
      {{-- <div class="row">
        <div class="col-lg-8 col-md-12 col-12 col-sm-12">
          <div class="card">
            <div class="card-header">
              <h4>Statistics</h4>
              <div class="card-header-action">
                <div class="btn-group">
                  <a href="#" class="btn btn-primary">Week</a>
                  <a href="#" class="btn">Month</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <canvas id="myChart" height="182"></canvas>
              <div class="statistic-details mt-sm-4">
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                  <div class="detail-value">$243</div>
                  <div class="detail-name">Today's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                  <div class="detail-value">$2,902</div>
                  <div class="detail-name">This Week's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                  <div class="detail-value">$12,821</div>
                  <div class="detail-name">This Month's Sales</div>
                </div>
                <div class="statistic-details-item">
                  <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                  <div class="detail-value">$92,142</div>
                  <div class="detail-name">This Year's Sales</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}

    </section>
  </div>
    
@endsection