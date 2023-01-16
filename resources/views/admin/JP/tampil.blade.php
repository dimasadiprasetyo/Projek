@extends('layout.template')
@section('title')
    Laporan Jurnal Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM LAPORAN JURNAL PENJUALAN </font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
    <div class="container">
        <form action="{{route('cetakJP.index')}}" method="post" target="_blank">
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
                <table class="table" border="" >
                    <thead style="background-color: black">
                        <tr style="text-align: center">
                            <th style="color: white" rowspan="2">Tanggal</th>
                            <th style="color: white" rowspan="2">Keterangan</th>
                            <th style="color: white" rowspan="2">Reff</th>
                            <th style="color: white">Debet</th>
                            <th style="color: white">Kredit</th>
                        </tr>
                        <tr>
                            <th style="color: white; text-align-last: center; background-color: rgb(255, 0, 0)">Piutang</th>
                            <th style="color: white; text-align-last: center; background-color: rgb(255, 0, 0)">Penjualan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                            
                            @foreach ($Trx_header as $header)
                            @foreach ($Trx_detail as $detail)

                                @if ($header->id_trx == $detail->id_trx)
                                    @foreach ($barang as $brg)
                                        @if ($detail->barang_id == $brg->kode_barang)
                                            <tr>
                                                <td style="text-align: center">{{date('d-m-Y',strtotime($header->tgl_trx))}}</td>
                                                <td style="text-align: center">{{$header->Pelanggan->nama_pelanggan}}</td>
                                                <td></td>
                                                <td style="text-align: right">Rp.{{number_format($header->kurang_bayar,0,',','.')}}</td>
                                                <td style="text-align: right">Rp.{{number_format($header->kurang_bayar,0,',','.')}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach  
                        @endforeach
                        <tr>
                            <td colspan="3"  class="text-center" style="background-color: black; color: white"><b>Total</b></td>
                            <td style="text-align: right">Rp. {{number_format($penjualan,0,',','.')}}</td>
                            <td style="text-align: right">Rp. {{number_format($penjualan,0,',','.')}}</td>
                        </tr>
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