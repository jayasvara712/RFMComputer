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
        <h1>Tambah Karyawan</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/pemilik/karyawan" method="post" enctype="multipart/form-data">
                        @csrf
                      
                      <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                      </div>

                      <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                      </div>

                      <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                      </div>

                      <input type="hidden" name="role" value="admin">

                      <div class="form-group">
                        <label>Foto</label>
                        <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                        <input type="file" name="foto" id="image" class="form-control" onchange="previewImage()">
                      </div>

                      <a href="/pemilik/karyawan" class="btn btn-danger"><span>Kembali</span></a>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      
                    </form>
                </div>
            </div>
          </div>
      </div>

    </section>
  </div>
    
@endsection