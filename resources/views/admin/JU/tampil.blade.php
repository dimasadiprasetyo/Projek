@extends('layout.template')
@section('title')
    Laporan Jurnal Umum /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM LAPORAN JURNAL UMUM </font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
    <div class="container">
        <form action="{{route('cetakJU.index')}}" method="post" target="_blank">
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
                        <div class="col-12">
                            <button type="submit" class="btn btn-dark" target="_blank">
                                <i class='fas fa-print' style='font-size:13px'></i> 
                                <span style="font-size: 13px"> Print</span>
                            </button>
                        </div>
                    </div>
        </form>
    </div>

    <br>
   
        <div class="card rounded shadow border-0">
            <div class="table-responsive">
                {{-- <table class="table" id="tabele">
                    <thead style="background-color: black">
                        <tr style="text-align: center;color: white;font-size: 15px;font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                            <th style="font-size: 15px; color: white">No</th>
                            <th style="font-size: 15px; color: white">Id Transaksi</th>
                            <th style="font-size: 15px; color: white">Tanggal Penjualan</th>
                            <th style="font-size: 15px; color: white">Pembayaran</th>
                            <th style="font-size: 15px; color: white">STATUS POSTING</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Trxheader as $penjualan)
                            <tr  style="font-size: 15px">
                                <td style="text-align: center">{{$loop->iteration}}</td>
                                <td style="text-align: center">{{$penjualan->trx_header->id_trx}}</td>
                                <td>{{date('d F Y',strtotime($penjualan->trx_header->tgl_trx))}}</td>
                                <td style="text-align: center">Rp.{{number_format($penjualan->trx_header->total_bayar - $penjualan->trx_header->kurang_bayar,0,',','.')}}</td>
                                <td style="text-align: center">
                                    
                                    <a href="{{route('posting.index',$penjualan->id_jurnal)}}" class="btn btn-warning">
                                        <i class='fas fa-plus fa-fw'   aria-hidden="true" style='font-size:13px'></i> Posting</a>
                                        
                            </tr>  
                        @endforeach
                    </tbody>
                
                </table> --}}
                <table class="table" border="" >
                    <thead style="background-color: black">
                        <tr style="text-align: center">
                            <th style="color: white">Tanggal</th>
                            <th style="color: white">Keterangan</th>
                            <th style="color: white">Reff</th>
                            <th style="color: white">Debet</th>
                            <th style="color: white">Kredit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Jurnalheader as $header)
                            <tr style="background:lightblue;">
                                <td style="text-align: center">{{tgl_indo($header->tanggal)}}</td>
                                <td><b>{{$header->keterangan}}</b></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
        
                            @foreach ($Jurnaldetail as $detail)
                                @if ($detail->id_jurnal == $header->id_jurnal)
                                    <tr>
                                        <td></td>
                                        <td>{{$detail->Akun->nama_akun}}</td>
                                        <td></td>
                                        <td style="text-align: right">Rp.{{number_format($detail->debit > 0 ? $detail->debit : null,0,',','.')}}</td>
                                        <td style="text-align: right">Rp.{{number_format($detail->kredit > 0 ? $detail->kredit : null,0,',','.')}}</td>
                                    </tr>  
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
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