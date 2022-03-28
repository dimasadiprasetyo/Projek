@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; DAFTAR TRANSAKSI TUNAI </font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
    {{-- <a class="btn btn-info mb-4 " href='<?= base_url("index.php/Laporan/LPE/cetak/$bulan/$tahun"); ?>' target="_blank">Cetak</a> --}}


    <div class="table-responsive">
        <table class="table table-bordered table-md" id="tabele">
            <!--Judul Tabel -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Transaksi</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $penjualan)
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
                </tr>
                    
                @endforeach
            </tbody>
            {{-- <tr>
                <td colspan="7" class="text-center">Total Penjualan</td>
                <td><?= 'Rp. ' . number_format($total, 0, ',', '.')  ?></td>
            </tr> --}}
        </table>
    </div>
</div>
</div>
@endsection