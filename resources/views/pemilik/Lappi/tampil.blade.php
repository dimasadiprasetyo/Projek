@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')

    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN PIUTANG</font>
    </h1>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')

        <div class="card-body">
            <a href="{{route('cetaklappi.index')}}" class="btn btn-dark mr-2">
                <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
              </a>
            <div class="table-responsive">
                    <table class="table table-bordered table-md" id="tabele">
                        <!--Judul Tabel -->
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Id Transaksi</th>
                                <th>Nama Pelanggan</th>
                                <th>Penjualan</th>
                                <th>Total Bayar</th>
                                <th>Saldo Piutang</th>
                                <th>Status Piutang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Trxheader as $piutang)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{date('d-m-Y',strtotime($piutang->tgl_trx))}}</td>
                                <td>{{$piutang->id_trx}}</td>
                                <td>{{$piutang->Pelanggan->nama_pelanggan}}</td>
                                <td>{{$piutang->jenis_transaksi}}</td>
                                <td>{{$piutang->total_bayar}}</td>
                                <td>{{$piutang->kurang_bayar}}</td>
                                <td>{{$piutang->status_trx}}
                                </td> 
                            </tr>
                                
                            @endforeach
                        </tbody>
                        <tr>
                            <td colspan="6" class="text-center"><b>Total Piutang</b></td>
                            <td>{{$totalPiutang}}</td>
                        </tr>

                    </table>
                    <br>
                </div>

            

        </div>
    </div>
    @endsection