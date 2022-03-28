@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #6565c8;">
        <font size="5" face="Century Gothic"><i class="fas fa-balance-scale" style='font-size:25px;'></i>&nbsp; KELOLA LAPORAN NERACA</font>
    </h1>

</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div style="margin-top: 45px;"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <!--  <i class="fas fa-balance-scale"></i><h3 class="card-title">Neraca</h3> -->
            </div>
            <div class="card-body">
                <div class="row">
                    &nbsp;&nbsp;&nbsp;&nbsp;<button onclick="cetak()" class="btn btn-primary waves-effect"> <i class="fas fa-plus-circle"></i> <span>Cetak</span> </button>
                </div>
                <br>
                <table id="neraca" class="" style=" width: 100%;height: 50%;color: black" border="1">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">LANCAR JAYA</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">NERACA</th>

                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">Periode tgl></th>
                        </tr>
                        <tr>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Debet</th>
                            <th>Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                               
                               
                            </tr>
                        
                        <tr>
                            <td colspan="2" style="background: grey"><b>Jumlah</b></td>
                        
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    function cetak() {
     
    }
</script> --}}
@endsection