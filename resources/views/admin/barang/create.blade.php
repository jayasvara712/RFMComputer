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
        <h1>Tambah Barang</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/barang" method="post" enctype="multipart/form-data">
                        @csrf
                      
                      <div class="form-group">
                        <label>Kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" value="{{ 'KDB-'.$kd }}" readonly>
                      </div>

                      <div class="form-group">
                        <label>Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}">
                      </div>

                      <div class="form-group">
                        <label>Jenis Barang</label>
                        <select name="id_jenis" id="" class="form-control">
                          <option value="" selected>Pilih Jenis Barang</option>
                            @foreach ($jenis as $jenis) 
                                @if (old('id_jenis') == $jenis->id_jenis)
                                    <option value="{{ $jenis->id_jenis }}" selected>{{ $jenis->nama_jenis }}</option>
                                @else
                                    <option value="{{ $jenis->id_jenis }}">{{ $jenis->nama_jenis }}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Satuan Barang</label>
                          <select name="id_satuan" id="" class="form-control">
                            <option value="" selected>Pilih Satuan barang</option>
                              @foreach ($satuan as $satuan) 
                                  @if (old('id_satuan') == $satuan->id_satuan)
                                      <option value="{{ $satuan->id_satuan }}" selected>{{ $satuan->nama_satuan }}</option>
                                  @else
                                      <option value="{{ $satuan->id_satuan }}">{{ $satuan->nama_satuan }}</option>
                                  @endif
                              @endforeach
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Gambar</label>
                        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" name="gambar" id="image" class="form-control" onchange="previewImage()">
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