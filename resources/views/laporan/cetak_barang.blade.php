<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <style>
      table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        page-break-inside: avoid;
      }

      td, th {
        border: 1px solid black;
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #dddddd;
      }
      
      .table{
        margin-top: 50px;
        display: table;
        width: 300px;
      }
      .tr{
        display: table-row;
        padding-bottom: 10px;
      }
      .td{
          display: table-cell;
          vertical-align: middle;
          text-align: center;
           direction: rtl;
        line-height: 10px;
      }
      .hr{
        padding-top: 100px;
         dline-height: 200%;
      }
    </style>
</head>
<body>
  <center>
    <h1>RFM Computer</h1>
    <h3>Jalan Tungkak Sorosutan 824 UH VI Yogyakarta</h3>
  </center>
  
    <hr>
    <h4 align="center">Data Barang</h4>
    <table>
      <tr>
        <th>No</th>
        <th>Kode Barang</th>
        <th>Nama Barang</th>
        <th>Nama Jenis</th>
        <th>Nama Satuan</th>
        <th>Gambar</th>
      </tr>
      @foreach ($barang as $barang)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $barang->kode_barang }}</td>
        <td>{{ $barang->nama_barang }}</td>
        <td>{{ $barang->jenis->nama_jenis }}</td>
        <td>{{ $barang->satuan->nama_satuan }}</td>
        <td>
          @if($barang->gambar != null)
             <img src="{{ asset("storage/".$barang->gambar) }}" style="width: 100px;">
          @else
            No Image
          @endif
        </td>
      </tr>
      @if ( $loop->iteration % 6 == 0 )
          <div style="page-break-before:always;"> </div>
      @endif
      @endforeach
    </table>
    {{-- ttd --}}
    <div class="table">
      <div class="tr">
      </div>
      <div class="tr">
         <p class="td">Yogyakarta, {{ $date }}</p>
      </div>
      <div class="tr">
         <p class=""></p>
      </div>
      <div class="tr">
         <p class=""></p>
      </div>
      <div class="tr">
         <p class=""></p>
      </div>
      <h3 class="td">Rizqi Fathul Munir<br></h3>
      <div class="tr">
         <h1 class="td">
          <hr>
         </h1>
      </div>
    </div>
</body>
</html>