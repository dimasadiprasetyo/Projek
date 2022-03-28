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


    <div class="table-responsive">
        <table class="table table-bordered table-md" id="tabele">
            <!--Judul Tabel -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>tanggal Penjualan</th>
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
                        {{$penjualan->id_trx}}
                    </td>
                    <td>
                        {{date('d-m-Y',strtotime($penjualan->tgl_trx))}}
                    </td>
                    <td>
                        {{$penjualan->total_bayar}}
                    </td>
                    {{-- <td>
                        <a href="#" class="btn btn-warning">Edit</a>
                            <form action="#" class="d-inline" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                            </form>
        
                    </td> --}}
                </tr>
                    
                @endforeach
            </tbody>
         
        </table>
    </div>
</div>
</div>
@endsection