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
        <h1>Tambah Jenis</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/admin/jenis" method="post" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group">
                        <label>Nama Jenis</label>
                        <input type="text" class="form-control" name="nama_jenis" value="{{ old('nama_jenis') }}">
                      </div>

                      <button type="submit" class="btn btn-primary">Simpan</button>
                      
                    </form>
                </div>
            </div>
          </div>
      </div>

    </section>
  </div>
  
  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2022 <div class="bullet"></div> Design By <a href="#">Jaya Svara</a>
    </div>
    <div class="footer-right">
      2.3.0
    </div>
  </footer>
    
@endsection