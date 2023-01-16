@extends('layout.template')
@section('title')
    Bayar Angsuran /
@endsection
@section('judul')
<h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fas fa-hand-holding-usd" style='font-size:25px;'></i>&nbsp;DATA ANGSURAN </font>
  </h1>
@endsection

@section('content')
<div class="card-body">
    <div class="card rounded shadow border-0">
        <div class="table-responsive">
            <table class="table table-border"id="tabel">
                <thead class="thead-dark" style="background-color: black; color: white">
                    <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                        <th style="color: white">No</th>
                        <th style="color: white">Id Transaksi</th>
                        <th style="color: white">Nama Pelanggan</th>
                        <th style="color: white">Tanggal Transaksi</th>
                        <th style="color: white">Tanggal Jatuh Tempo</th>
                        <th  style="color: white">Jumlah Total Bayar</th>
                        <th  style="color: white">kurang Bayar</th>
                        <th  style="color: white">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Trxheader as $header)
                    <tr style="font-size: 15px">
                        <td  style="color: black">{{$loop->iteration}}</td>
                        <td  style="color: black">{{$header->id_trx}}</td>
                        <td  style="color: black">{{$header->Pelanggan->nama_pelanggan}}</td>
                        <td  style="color: black">{{tgl_indo($header->tgl_trx)}}</td>
                        <td  style="color: black">{{tgl_indo($header->tgl_jatuhtemp)}}</td>
                        <td  style="color: black">Rp.{{number_format($header->total_bayar, 0,',','.')}}</td>
                        <td  style="color: black">Rp.{{number_format($header->kurang_bayar, 0,',','.')}}</td>
                        <td>
                            <a href="{{route('bayarindex.index', $header->id_trx)}}" class="btn btn-warning">
                                <i class="fas fa-folder-open" style="font-size:13px"></i>
                                <span style="font-size: 13px"> Bayar Angsuran</span>
                            </a>
                        </td>
                    </tr>
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('Awal')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">    
@endpush
@push('Akhir')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

    <script>
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
    </script>
@endpush