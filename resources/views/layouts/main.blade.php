<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>RFM Computer</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="/stisla/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/stisla/node_modules/font-awesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="/stisla/node_modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="/stisla/node_modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">

  {{-- data table --}}
  <link rel="stylesheet" href="/stisla/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/stisla/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="/stisla/assets/css/style.css">
  <link rel="stylesheet" href="/stisla/assets/css/components.css">
  <style>
    .pilihan{
      display: none;
    }
  </style>
</head>

<body>
  
    <div id="app">
        <div class="main-wrapper">
            @include('layouts.navbar')
            @include('layouts.sidebar')
            @yield('container')
          
        </div>
      </div>

  <footer class="main-footer">
    <div class="footer-left">
      Copyright &copy; 2022 <div class="bullet"></div> <a href="#">Jaya Svara</a>
    </div>
    <div class="footer-right">
      2.3.0
    </div>
  </footer>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/stisla/assets/js/stisla.js"></script>

  <!-- JS Libraies -->
  <script src="/stisla/node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="/stisla/node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="/stisla/node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="/stisla/node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="/stisla/node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="/stisla/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

  {{-- data table --}}
  <script src="/stisla/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
  <script src="/stisla/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  {{-- <script src="/stisla/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js"></script> --}}
  <script src="/stisla/assets/js/page/modules-datatables.js"></script>

  <!-- Template JS File -->
  <script src="/stisla/assets/js/scripts.js"></script>
  <script src="/stisla/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  {{-- <script src="/stisla/assets/js/page/index-0.js"></script> --}}

  {{-- sweet alert --}}
  <script src="/stisla/node_modules/sweetalert/dist/sweetalert.min.js"></script>
  {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
  <script src="/asset/js/custom.js"></script>
  
  <script src="/asset/js/sweetalert.js"></script>
</body>
</html>
