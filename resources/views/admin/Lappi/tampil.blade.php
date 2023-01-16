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
           
            {{-- <a href="{{route('cetaklappi.index')}}" class="btn btn-dark mr-2" target="_blank">
                <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
            </a>
            <br>
            <br> --}}
            <div class="container">
                <form action="{{route('cetaklappi.index')}}" method="post" target="_blank">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <select name="bulan" id="bulan" class="form-control col-10">
                                <i class="fa fa-user"></i>
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
                                    $min = $year - 2;
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
                                <div class="col-12" target="_blank">
                                    <button type="submit" class="btn btn-dark">
                                        <i class='fas fa-print' style='font-size:13px'></i> 
                                        <span style="font-size: 13px" > Print</span>
                                    </button>
                                </div>
                            </div>
                </form>
            </div>
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
@push('Akhir')
    <script>//datatable
        $(document).ready( function () {
            $('#tabele').DataTable();
        });
        
    </script>
    
@endpush