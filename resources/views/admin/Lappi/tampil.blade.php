@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN PIUTANG</font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')

        <div class="card-body">
            <div class="container">
                
                    <div class="row">
                        <div class="col-6">
                            <!-- <label for="bulan">Pilih Bulan</label> -->
                            <select name="bulan" id="bulan" class="form-control col-10">
                                <option selected disabled>--Pilih Bulan--</option>
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <!-- <label for="tahun">Pilih tahun</label> -->
                             <select name="tahun" id="tahun" class="form-control col-10">
                                <option selected disabled>--Pilih Tahun--</option>
                            </select>
                        </div>
                    </div>
                    <div class="my-4"></div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-success">Lihat</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <br>
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
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td>
                                    {{date('d-m-Y',strtotime($piutang->created_at))}}
                                </td>
                                <td>
                                    {{$piutang->id_trx}}
                                </td>
                                <td>
                                    {{$piutang->Pelanggan->nama_pelanggan}}
                                </td>
                                <td>
                                    {{$piutang->jenis_transaksi}}
                                </td>
                                <td>
                                    {{$piutang->total_bayar}}
                                </td>
                                <td>
                                    {{$piutang->kurang_bayar}}
                                </td>
                                <td>
                                    {{$piutang->status_trx}}
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