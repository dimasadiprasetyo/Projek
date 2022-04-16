@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN </font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
    <a href="#" class="btn btn-dark mr-2">
        <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
      </a>
    <div class="table-responsive">
        <table class="table table-bordered table-md" id="tabele">
            <!--Judul Tabel -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pembayaran</th>
                    <th>STATUS POSTING</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Trxheader as $penjualan)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{$penjualan->trx_header->id_trx}}
                    </td>
                    <td>
                        {{date('l, d F Y',strtotime($penjualan->trx_header->tgl_trx))}}
                    </td>
                    <td>
                        {{$penjualan->trx_header->total_bayar}}
                    </td>
                    <td>
                        <a href="{{route('posting.index', $penjualan->id_jurnal)}}" class="btn btn-warning">Posting</a>
                        {{-- <form action="{{route('posting.index',$penjualan->id_trx)}}" class="d-inline delete" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-warning posting" id="posting" data-id="{{$penjualan->id_trx}}">
                            <i class="fa fa-plus fa-fw" aria-hidden="true"></i>&nbsp;Posting
                        </button>
                        </form> --}}
        
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
         
        </table>
    </div>
</div>
</div>
@endsection