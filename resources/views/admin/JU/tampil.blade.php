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
    <div class="container">
        <form action="{{route('cetakJU.index')}}" method="post">
        @csrf
            <div class="row">
                <div class="col-6">
                    <select name="bulan" id="bulan" class="form-control col-10">
                        <option value="0" selected disabled> Pilih Bulan</option>
                            <option value="01"> Januari</option>
                            <option value="02"> Februari</option>
                            <option value="03"> Maret</option>
                            <option value="04"> April</option>
                            <option value="05"> Mei</option>
                            <option value="06"> Juni</option>
                            <option value="07"> Juli</option>
                            <option value="08"> Agustus</option>
                            <option value="09"> September</option>
                            <option value="10"> Oktober</option>
                            <option value="11"> November</option>
                            <option value="12"> Desember</option>
                    </select>
                </div>
                <div class="col-6">
                    <select name="tahun" id="tahun" class="form-control col-10">
                        <option selected disabled>--Pilih Tahun--</option>
                        <?php 
                            $year = date('Y');
                            $min = $year - 60;
                            $max = $year;
                                for( $i=$max; $i>=$min; $i-- ) {
                                    echo '<option value='.$i.'>'.$i.'</option>';
                                }
                        ?>
                    </select>
    </div>
</div>
                <div class="my-4"></div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark">
                                <i class='fas fa-print' style='font-size:13px'></i> 
                                <span style="font-size: 13px"> Print</span>
                            </button>
                        </div>
                    </div>
            </form>
            <br>
    <div class="table-responsive">
        <table class="table table-primary table-md table-striped" id="tabele">
            <!--Judul Tabel -->
            <thead>
                <tr style="text-align: center">
                    <th>No</th>
                    <th class="table-primary">Id Transaksi</th>
                    <th>Tanggal Penjualan</th>
                    <th>Pembayaran</th>
                    <th>STATUS POSTING</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Trxheader as $penjualan)
                <tr >
                    <td style="text-align: center">{{$loop->iteration}}</td>
                    <td style="text-align: center">{{$penjualan->trx_header->id_trx}}</td>
                    <td>{{date('l, d F Y',strtotime($penjualan->trx_header->tgl_trx))}}</td>
                    <td style="text-align: center">{{$penjualan->trx_header->total_bayar}}</td>
                    <td style="text-align: center">
                        <a href="{{route('posting.index', $penjualan->id_jurnal)}}" class="btn btn-warning">
                            <i class='fas fa-plus' style='font-size:13px'></i> Posting</a>
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
         
        </table>
    </div>

@endsection