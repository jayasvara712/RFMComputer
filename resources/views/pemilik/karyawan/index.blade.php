@extends('layouts.main')
@section('container')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Karyawan</h1>
      </div>
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <h4>Data Karyawan</h4>
              <div class="card-header-action">
                <a href="/pemilik/karyawan/create" class="btn btn-success">
                  <i class="fas fa-plus"></i> Tambah Karyawan</a>
              </div>
            </div>

            @if (session()->has('success'))
              <div id="success" style="visibility: hidden">
                  {{ session('success') }}
              </div>
            @endif

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-2">
                  <thead>
                    <tr>
                      <th class="text-center">
                        #
                      </th>
                      <th>Nama Karyawan</th>
                      <th>Email</th>
                      <th>No Telepon</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($user as $user)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>
                          {{ $user->nama }}
                        </td>
                        <td>
                          {{ $user->email }}
                        </td>
                        <td>
                          {{ $user->no_telp }}
                        </td>
                        <td>
                          <a href="/pemilik/karyawan/{{ $user->id_user }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          {{-- <form action="/pemilik/karyawan/{{ $user->id_user }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button>
                          </form> --}}
                          <button class="btn btn-danger btn-sm" id="btndelete{{ $loop->iteration }}" type="button" onclick="deleteData({{ $loop->iteration }},{{ $user->id_user }}, '/pemilik/karyawan/','karyawan')"><i class="fas fa-trash"></i></button>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

    </section>
  </div>
    
@endsection