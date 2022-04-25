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
          <i class="fas fa-dollar-sign" style="font-size: 35px"></i>
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
  <div class="card-header">
    <div class="container">
      <div class="panel">
        <div id="chartlaporan"></div>
      </div>
    </div>
  </div>
</div>




@endsection
@push('Awal')
@endpush
@push('Akhir')
<script src="{{asset('assets/js/highcharts.js')}}"></script>
<script style="text/javascript">
         var pendapatan = <?php echo json_encode($piutangdagang) ?>;
          var pend = <?php echo json_encode($pendapatan) ?>;
          
       
        
         Highcharts.chart('chartlaporan', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Statistik Pedapatan Penjualan'
    },
    subtitle: {
        text: 'Material Kayu Lancar Jaya'
    },
    xAxis: {
        categories: [
            'jan', 'feb','mar','apr','mei','jun','jul','aug','sept','okt','nov','des'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Piutang',
        data: [pendapatan]

    }, {
        name: 'Pendapatan',
        data: [pend]

    }]
});

</script>
@endpush
    