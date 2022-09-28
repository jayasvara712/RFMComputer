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
        <h1>Tambah  Barang Masuk</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/barang_masuk" method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_user" value="{{ auth()->user()->id_user }}">
                    </div>

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="id_barang" id="id_barang" class="form-control" onchange="SelectBarang('tambah')">
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
                        <label>Jumlah Stok</label>
                        <input type="number" class="form-control" name="jumlah_stok" id="jumlah_stok" readonly>
                      </div>

                      <div class="form-group">
                        <label>Jumlah Barang Masuk</label>
                        <input type="number" class="form-control" name="jumlah_masuk" id="jumlah_masuk" value="1" min="1" onkeyup="total_barang_masuk()">
                      </div>
                      
                      <div class="form-group">
                        <label>Total Stok</label>
                        <input type="number" class="form-control" name="total_stok" id="total_stok" value="{{ old('total_stok') }}" readonly>
                      </div>

                      <div class="form-group">
                        <label>Tanggal Masuk</label>
                        <input type="date" class="form-control" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
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