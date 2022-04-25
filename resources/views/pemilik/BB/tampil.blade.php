@extends('layout.template')
@section('title')
    Laporan Buku Besar /
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
                    <span class="text-left" style="font-size: 18px; font-family: Georgia, 'Times New Roman', Times, serif">Nama Akun : {{$akun->nama_akun}} </span>
                </div>
                <div class="col-6">
                    <span class="text-right" style="font-family: Georgia, 'Times New Roman', Times, serif;font-size: 18px">No Akun : {{$akun->id_akun}} </span>
                </div>
            </div>
            <div class="card rounded shadow border-0">
                <div class="table-responsive">
                    <table class="table  table-stripped">
                        <thead  style="background-color: black">
                            <tr style="font-size: 15px; font-family: Georgia, 'Times New Roman', Times, serif">
                                <th style="color: white">Tanggal</th>
                                <th style="color: white">Keterangan</th>
                                <th style="color: white">Reff</th>
                                <th style="color: white">Debit</th>
                                <th style="color: white">Kredit</th>
                                <th style="color: white">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach($Jurnalheader as $header)
                                @foreach($header->jurnal_detail as $detail)
                                    @if($detail->id_akun == $akun->id_akun) 
                                        <tr style="font-size: 15px">
                                            <td>{{date('d/m/y',strtotime($header->tanggal))}}</td>
                                            <td>{{$header->keterangan}}</td>
                                            <td>{{$detail->id_jurnal}}</td>
                                            <td>Rp.{{number_format($detail->debit,0,',','.')}}</td>
                                            <td>Rp.{{number_format($detail->kredit,0,',','.')}}</td>
                                            <td>Rp.{{number_format($total +=($detail->debit - $detail->kredit),0,',','.')}}</td>
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
</div>
@endforeach
@endsection