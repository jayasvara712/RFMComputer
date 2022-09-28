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
    <h4 align="center">Data Karyawan</h4>
    <table>
      <tr>
        <th>No</th>
        <th>Nama Karyawan</th>
        <th>Username</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Foto</th>
      </tr>
      @foreach ($user as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->nama }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->no_telp }}</td>
        <td>
          @if($user->foto != null)
            <img src="{{ asset('storage/'.$user->foto) }}" style="width: 100px">
          @else
            No Image
          @endif
        </td>
      </tr>
      @if ( $loop->iteration % 7 == 0 )
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