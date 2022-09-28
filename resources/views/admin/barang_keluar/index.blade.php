@extends('layouts.main')
@section('container')

<!-- Main Content -->
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Barang Keluar</h1>
      </div>
      
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header">
              <h4>Data Barang Keluar</h4>
              <div class="card-header-action">
                <a href="/admin/barang_keluar/create" class="btn btn-success">
                  <i class="fas fa-plus"></i> Tambah Barang Keluar</a>
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
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Tanggal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($barang_keluar as $barang_keluar)
                      <tr>
                        <td>
                          {{ $loop->iteration }}
                        </td>
                        <td>
                          {{ $barang_keluar->barang->nama_barang }}
                        </td>
                        <td>
                          {{ $barang_keluar->jumlah_keluar }}
                        </td>
                        <td>
                          {{ date('d F Y', strtotime($barang_keluar->tanggal_keluar)) }}
                        </td>
                        <td>
                          <a href="/admin/barang_keluar/{{ $barang_keluar->id_barang_keluar }}/edit" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                          {{-- <form action="/admin/barang_keluar/{{ $barang_keluar->id_barang_keluar }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                            <input type="hidden" name="jml_brg" value="{{ $barang_keluar->jumlah_keluar }}">
                            <input type="hidden" name="id_barang" value="{{ $barang_keluar->id_barang }}">
                            <button class="btn btn-danger border-0" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button>
                          </form> --}}
                          <button class="btn btn-danger btn-sm" id="btndelete{{ $loop->iteration }}" type="button" onclick="deleteData({{ $loop->iteration }},{{ $barang_keluar->id_barang_keluar }},'/admin/barang_keluar/','barang keluar')"><i class="fas fa-trash"></i></button>
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