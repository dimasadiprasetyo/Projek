<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title') {{config('app.name')}}</title>

  @stack('Awal')
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  @include('sweetalert::alert')
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
   {{-- navbar --}}
   @include('layout.partial.navbar')

      {{-- sidebar --}}
@include('layout.partial.sidebar')

      <!-- Main Content -->
      

      <div class="main-content">
        <section class="section">
          <div class="section-header">
            {{-- <h1 class="fas fa-bell">SELAMAT DATANG DI SISTEM PENJUALAN LANCAR JAYA</h1> --}}
          <h1><strong>@yield('judul')</strong></h1>
          <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dasboard</a></div>
          <div class="breadcrumb-item active"><a href="#">Boostrap Component</a></div>
          <div class="breadcrumb-item active"><a href="#">Form</a></div>

          </div>
        </div>


          {{-- <div class="section-body">
          </div> --}}
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022<div class="bullet"></div> Design By <a href="https://nauval.in/">DIMAS ADI PRASETYO</a>
        </div>
        <div class="footer-right">
          2.3.0
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
