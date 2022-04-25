@extends('layout.template')
@section('title')
    Laporan Jurnal Umum /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM LAPORAN JURNAL UMUM </font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection

@section('content')
<div class="card-body">
    <div class="container">
       <div class="card rounded shadow border-0">
            <div class="table-responsive">
                <table class="table"  >
                    <thead style="background-color: black">
                        <tr style="font-size: 15px; font-family: Georgia, 'Times New Roman', Times, serif">
                            <th style="color: white">Tanggal</th>
                            <th style="color: white">Keterangan</th>
                            <th style="color: white">Reff</th>
                            <th style="color: white">Debet</th>
                            <th style="color: white">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Jurnalheader as $header)
                            <tr style="background:rgb(173, 173, 173); font-size: 15px">
                                <td >{{date('d/m/y',strtotime($header->tanggal))}}</td>
                                <td><b>{{$header->keterangan}}</b></td>
                                <td></td>
                                <td></td>
                                <td></td>    
                            </tr>
                                @foreach ($Jurnaldetail as $detail)
                                    @if ($detail->id_jurnal == $header->id_jurnal)
                                        <tr style="font-size: 15px">
                                            <td></td>
                                            <td>{{$detail->Akun->nama_akun}}</td>
                                            <td></td>
                                            <td>Rp.{{number_format($detail->debit > 0 ? $detail->debit : null),0,'.','.'}}</td>
                                            <td style="color: brown">Rp.{{number_format($detail->kredit > 0 ? $detail->kredit : null),0,'.','.' }}</td>
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
@endsection