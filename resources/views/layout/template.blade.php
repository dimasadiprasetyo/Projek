<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') {{config('app.name')}}</title>

  @stack('Awal')
  <!-- General CSS Files -->
  <link rel="shortcut icon" href="{{asset('assets/LJA.ico')}}">
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <style>
    body {
      font-family: "Nunito",'Arial Narrow Bold' ;
      font-size: 16px;
      color: black;
      
    }
      .table-striped{
          thead,tr,th{
            background-color: #4CAF50;
            color: white;
        }
      }
  </style>
</head>

<body >
    @include('sweetalert::alert')
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg">
      </div>
        {{-- navbar --}}
        @include('layout.partial.navbar')

        {{-- sidebar --}}
        @include('layout.partial.sidebar')

        <!-- Main Content -->
      

      <div class="main-content">
        <section class="section">
          <div class="section-header">
              <h1><strong>@yield('judul')</strong></h1>
              <h1><strong>@yield('nama')</strong></h1>
            {{-- <div class="section-header-breadcrumb" style="font-size: 20px">
              <div class="breadcrumb-item active"><a href="#" style="font-size: 16px">Dasboard1</a></div>
              <div class="breadcrumb-item active"><a href="#" style="font-size: 16px">Barang</a></div>
            </div> --}}
          </div>


          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022<div class="bullet"></div> Design By <a href="https://nauval.in/">DIMAS ADI PRASETYO-19.120.0005</a>
        </div>
        <div class="footer-right">
          Sispen-Lj V2.1.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/js/jquery-3.3.1.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/js/jquery.nicescroll.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <!-- JS Libraies -->
  
  @stack('Akhir')
  <!-- Template JS File -->
  
  <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="{{asset('assets/js/sweetalert.min.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
