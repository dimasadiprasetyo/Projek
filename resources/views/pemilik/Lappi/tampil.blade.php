@extends('layout.template')
@section('title')
    Laporan Piutang /
@endsection
@section('judul')

    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM LAPORAN PIUTANG-PEMILIK</font>
    </h1>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')

        <div class="card-body">
            <div class="card rounded shadow border-0">
                <div class="table-responsive">
                        <table class="table table-striped" id="tabele">
                            <!--Judul Tabel -->
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
                                        <td>Rp.{{number_format($piutang->total_bayar,0,',','.')}}</td>
                                        <td>Rp.{{number_format($piutang->kurang_bayar,0,',','.')}}</td>
                                        <td>{{$piutang->status_trx}}
                                        </td> 
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="6" class="text-center"><b>Total Piutang</b></td>
                                <td>Rp.{{number_format($totalPiutang,0,',','.')}}</td>
                            </tr>
                        </table>
                        <br>
                </div>
            </div>
        </div>
    @endsection
    @push('Akhir')
    <script>//datatable
        $(document).ready( function () {
            $('#tabele').DataTable();
        });
        
    </script>
    
    @endpush