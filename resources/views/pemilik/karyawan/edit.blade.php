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
        <h1>Edit Karyawan</h1>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    
                    <form action="/pemilik/karyawan/{{ $user->id_user }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                        <label>Nama Karyawan</label>
                        <input type="text" class="form-control" name="nama" value="{{ $user->nama }}">
                      </div>

                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                      </div>

                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                      </div>

                      <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" class="form-control" name="old_password">
                      </div>

                      <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" class="form-control" name="password">
                      </div>

                      <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" name="password_confirm">
                      </div>

                      <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" class="form-control" name="no_telp" value="{{ $user->no_telp }}">
                      </div>

                      <input type="hidden" name="role" value="{{ $user->role }}">

                      <div class="form-group">
                        <label>Foto</label>
                        <input type="hidden" name="oldImage" value="{{ $user->foto }}">
                            @if ($user->foto)
                                <img src="{{ asset('storage/'.$user->foto) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                            @else
                                <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-5">
                            @endif
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