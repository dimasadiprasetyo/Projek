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

    <div class="table-responsive">
    <table class="table table-border" class="table table-striped" id="tabel">
        <thead class="thead-dark">
            <tr style="color: black;">
                <th style="color: black">No</th>
                <th style="color: black">Id Transaksi</th>
                <th style="color: black">Nama Pelanggan</th>
                <th style="color: black">Tanggal Transaksi</th>
                <th style="color: black">Tanggal Jatuh Tempo</th>
                <th  style="color: black">Jumlah Total Bayar</th>
                <th  style="color: black">kurang Bayar</th>
                <th  style="color: black">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Trxheader as $header)
            <tr  style="color: black">
                <td  style="color: black">{{$loop->iteration}}</td>
                <td  style="color: black">{{$header->id_trx}}</td>
                <td  style="color: black">{{$header->Pelanggan->nama_pelanggan}}</td>
                <td  style="color: black">{!! date('d M Y',strtotime($header->tgl_trx))!!}</td>
                <td  style="color: black">{!! date('d M Y',strtotime($header->tgl_jatuhtemp)) !!}</td>
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