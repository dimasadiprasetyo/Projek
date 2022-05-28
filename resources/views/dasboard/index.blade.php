@extends('layout.template')
@section('title')
    Dasboard /
@endsection
@section('judul')
{{-- <marquee direction="left" scrollamount="6" align="center">SELAMAT </marquee> --}}
<h2>Dasboard</h2>
@endsection
{{-- @section('nama')
    <div class="section-header-breadcrumb" style="font-size: 20px">
        <div class="breadcrumb-item active"><a href="#" style="font-size: 16px">Dasboard1</a></div>
        <div class="breadcrumb-item active"><a href="#" style="font-size: 16px">Barang</a></div>
    </div>
@endsection --}}

@section('content')
<div class="card">
  
  <div class="card-header">
    <div class="col-xl-5 col-md-6 mb-4">
      <div class="card card-statistic-1">
        <div class="card-icon" style="background-color: #000d80">
          <i class="far fa-user" style="font-size: 35px"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4 style="font-size: 18px">USERS</h4>
          </div>
          <div class="card-body" style="font-size: 18px">
            {{$user}}
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-5 col-md-6 mb-4">
      <div class="card card-statistic-1">
        <div class="card-icon" style="background-color: #db0408">
          <i class="fas fa-hand-holding-usd" style="font-size: 35px"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4 style="font-size: 18px">TOTAL PIUTANG</h4>
          </div>
          <div class="card-body" style="font-size: 18px">
            Rp. {{number_format($total3,0,',','.')}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-header">
    <div class="col-xl-5 col-md-6 mb-4">
      <div class="card card-statistic-1">
        <div class="card-icon" style="background-color: #00ab28">
          <i class="fas fa-funnel-dollar" style="font-size: 35px"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4 style="font-size: 18px">PENDAPATAN HARI INI</h4>
          </div>
          <div class="card-body" style="font-size: 18px">
            Rp. {{number_format($total2,0,',','.')}}
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-xl-5 col-md-6 mb-4">
      <div class="card card-statistic-1">
        <div class="card-icon" style="background-color: #008a19">
          {{-- <i class="fas fa-dollar-sign" style="font-size: 35px"></i> --}}
          <span style="font-size: 30px; color: white"><strong>Rp</strong></span>
          
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4 style="font-size: 18px">PENDAPATAN BULAN INI</h4>
          </div>
          <div class="card-body" style="font-size: 18px">
            Rp. {{number_format($total1,0,',','.')}}
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- statistik --}}
  {{-- <div class="card-header">
    <div class="container">
      <div class="panel">
        <div id="container"></div>
      </div>
    </div>
  </div> --}}

  {{-- <div class="container">
    <h1 style="text-align: center; color: red">Highcharts Laravel 7</h1>
    <div class="panel">
      <div id="container"></div>
    </div>
  </div> --}}
  
  
</div>




@endsection
@push('Awal')
@endpush
