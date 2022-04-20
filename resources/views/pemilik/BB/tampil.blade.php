@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; BUKU BESAR</font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')

@foreach($akuns as $akun)
<div style="margin-top: 50px;">
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-6">
                    <span class="text-left">Nama Akun : {{$akun->nama_akun}} </span>
                </div>
                <div class="col-6">
                    <span class="text-right">No Akun : {{$akun->id_akun}} </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Reff</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($Jurnalheader as $header)
                            @foreach($header->jurnal_detail as $detail)
                                @if($detail->id_akun == $akun->id_akun) 
                                    <tr>
                                        <td>{{$header->tanggal}}</td>
                                        <td>{{$header->keterangan}}</td>
                                        <td>{{$detail->id_jurnal}}</td>
                                        <td>{{$detail->debit}}</td>
                                        <td>{{$detail->kredit}}</td>
                                        <td>{{$total +=($detail->debit - $detail->kredit)}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection