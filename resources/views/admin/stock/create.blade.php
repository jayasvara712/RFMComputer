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
        <h1>Tambah Stock</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/stock" method="post" enctype="multipart/form-data">
                        @csrf

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" id="" class="form-control">
                          <option value="" selected>Pilih Nama Barang</option>
                            @foreach ($barang as $barang) 
                                @if (old('id_barang') == $barang->id_barang)
                                    <option value="{{ $barang->id_barang }}" selected>{{ $barang->nama_barang }}</option>
                                @else
                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Stok</label>
                        <input type="text" class="form-control" name="stock" value="0" readonly>
                      </div>

                      <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="">
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