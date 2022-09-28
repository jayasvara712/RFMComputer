@extends('layouts.second')
@section('container')

@if ($errors->any())
    <div id="error" style="visibility: hidden">
            @foreach ($errors->all() as $error)
              {{ $error }}
            @endforeach
    </div>
@endif

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Edit Barang Keluar</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/barang_keluar/{{ $barang_keluar->id_barang_keluar }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        
                        <input type="hidden" class="form-control" name="id_user" value="{{ $barang_keluar->id_user }}">
                        <input type="hidden" class="form-control" name="old_stock" id="old_stok" value="{{ $barang_keluar->jumlah_keluar }}">
                        <input type="hidden" class="form-control" name="id_barang" id="id_barang" value="{{ $barang_keluar->id_barang }}">

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="{{ $barang_keluar->barang->nama_barang }}" readonly>
                      </div>

                      <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok" readonly>
                      </div>

                      <div class="form-group">
                        <label>Jumlah Barang Keluar</label>
                        <input type="number" class="form-control" name="jumlah_keluar" id="jumlah_keluar" value="{{ old('jumlah_keluar', $barang_keluar->jumlah_keluar) }}" min="1" onkeyup="edit_total_barang_keluar()">
                      </div>

                      <div class="form-group">
                        <label>Total Stok</label>
                        <input type="number" class="form-control" name="total_stok" id="total_stok" readonly>
                      </div>

                      <div class="form-group">
                        <label>Tanggal Keluar</label>
                        <input type="date" class="form-control" name="tanggal_keluar" value="{{ old('tanggal_keluar', $barang_keluar->tanggal_keluar) }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Simpan</button>
                      
                    </form>
                </div>
            </div>
          </div>
      </div>

    </section>
  </div>
    
@endsection