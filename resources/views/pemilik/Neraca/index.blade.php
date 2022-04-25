@extends('layout.template')
@section('title')
    Laporan Neraca /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #6565c8;">
        <font size="5" face="Century Gothic"><i class="fas fa-balance-scale" style='font-size:25px;'></i>&nbsp; KELOLA LAPORAN NERACA-PEMILIK</font>
    </h1>

</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div style="margin-top: 45px;"></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="neraca" class="" style=" width: 100%;height: 50%;color: black" border="1">
                    <thead>
                        <tr>
                            <th colspan="4" class="text-center">LANCAR JAYA</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">NERACA</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="text-center">Periode {{$dt}}</th>
                        </tr>
                        <tr style="text-align: center" >
                            <th style="background-color: rgb(0, 0, 0); color: white">Kode Akun</th>
                            <th style="background-color: rgb(0, 0, 0); color: white">Nama Akun</th>
                            <th style="background-color: rgb(0, 0, 0); color: white">Debet</th>
                            <th style="background-color: rgb(0, 0, 0); color: white">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php 
                        $totalDebet = 0;
                        $totalKredit = 0;
                        @endphp
                        @foreach ($akuns as $akun)
                            @if($akun->saldo_akhir > 0)
                                @php
                                    $d = 0;
                                    $k = 0;   
                                @endphp
                                @foreach ($Jurnalheader as $header)
                                    @foreach ($header->jurnal_detail as $detail)
                                        @php
                                            $d += $detail->debit;
                                            $k += $detail->kredit;
                                        @endphp
                                    @endforeach
                                @endforeach
                                @php
                                $totalDebet += $d;
                                $totalKredit += $k;
                                @endphp
                                
                                <tr style="text-align: center">
                                    <td>{{$akun->id_akun}}</td>
                                    <td>{{$akun->nama_akun}}</td>
                                    <td>Rp.{{number_format($akun->jenis_akun == 'Debet' ? $totalDebet : 0,0,',','.')}}</td>
                                    <td>Rp.{{number_format($akun->jenis_akun == 'Kredit' ? $totalKredit : 0,0,',','.')}}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tr style="text-align: center">
                                <td colspan="2" style="background: rgb(0, 0, 0); color: white"><b>Jumlah</b></td>
                                <td><b>Rp.{{number_format($totalDebet,0,',','.')}}</b></td>
                                <td><b>Rp.{{number_format($totalKredit,0,',','.')}}</b></td>
                                
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection