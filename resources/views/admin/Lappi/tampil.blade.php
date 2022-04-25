@extends('layout.template')
@section('title')
    Laporan Piutang/
@endsection
@section('judul')

    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN PIUTANG</font>
    </h1>

@endsection
@section('content')

        <div class="card-body">
           
            <a href="{{route('cetaklappi.index')}}" class="btn btn-dark mr-2">
                <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
            </a>
            <br>
            <br>
            <div class="card rounded shadow border-0">
                <div class="table-responsive">
                    <table class="table" id="tabele">
                            <thead style="background-color: black;color: white">
                                <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                                    <th style="color: white">No</th>
                                    <th style="color: white">Tanggal</th>
                                    <th style="color: white">Id Transaksi</th>
                                    <th style="color: white">Nama Pelanggan</th>
                                    <th style="color: white">Penjualan</th>
                                    <th style="color: white">Total Bayar</th>
                                    <th style="color: white">Saldo Piutang</th>
                                    <th style="color: white">Status Piutang</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($Trxheader as $piutang)
                                    <tr style="font-size: 15px">
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{date('d/m/y',strtotime($piutang->tgl_trx))}}</td>
                                        <td>{{$piutang->id_trx}}</td>
                                        <td>{{$piutang->Pelanggan->nama_pelanggan}}</td>
                                        <td>{{$piutang->jenis_transaksi}}</td>
                                        <td>RP.{{number_format($piutang->total_bayar,0,',','.')}}</td>
                                        <td>Rp.{{number_format($piutang->kurang_bayar,0,',','.')}}</td>
                                        <td>{{$piutang->status_trx}}
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="6" class="text-center"><b>Total Piutang</b></td>
                                <td>Rp.{{number_format($totalPiutang,0,',','.')}}</td>
                                <td></td>
                            </tr>

                    </table>
                    <br>
                </div>
            </div>
        </div>
    
@endsection