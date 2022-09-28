@extends('layouts.main')
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
        <h1>Edit Stock</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/stock/{{ $stock->id_stock }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                      <div class="form-group">
                         <input type="hidden" class="form-control" name="id_barang" id="id_barang" value="{{ $stock->id_barang }}">

                        <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" value="{{ $stock->barang->nama_barang }}" readonly>
                      </div>

                      <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stock" value="{{ old('stock', $stock->stock) }}" readonly>
                      </div>

                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal', $stock->tanggal) }}">
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