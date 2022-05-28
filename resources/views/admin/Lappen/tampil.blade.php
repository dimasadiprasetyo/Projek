@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN </font>
    </h1>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
        
    {{-- <a href="{{route('cetaklappen.index')}}" class="btn btn-dark mr-2"
     target="_blank">
        <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
    </a> --}}
    {{-- <form action="{{route('cetaklappen.index')}}" method="POST" target="_blank">
        @csrf
        <input type="hidden" name="month" value="{{$month}}">
        <input type="hidden" name="year" value="{{$year}}">
            <button type="submit" class="btn btn-dark mr-2" >
                <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
            </button>
    </form> --}}
    <div class="container">
        <form action="{{route('cetaklappen.index')}}" method="post" target="_blank">
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
                    <div class="row" target="_blank">
                        <div class="col-12">
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
    <div class="table-responsive">
        <table class="table table-bordered table-md" id="tabele">
            <!--Judul Tabel -->
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pembeli</th>
                    <th>Nama Barang</th>
                    <th>Ukuran</th>
                    <th>Harga</th>
                    <th>Terjual</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1 @endphp
                {{-- @php
                    $a = 0;
                @endphp --}}
                @foreach ($Trx_header as $header)
                @foreach ($Trx_detail as $detail)
                {{-- @php
                    $a += $header->total_bayar;
                @endphp --}}
                        @if ($header->id_trx == $detail->id_trx)
                            @foreach ($barang as $brg)
                            @if ($detail->barang_id == $brg->kode_barang)
                            <tr>
                                <td>{{$no++}}</td>
                                        <td>{{date('d-m-Y',strtotime($header->tgl_trx))}}</td>
                                        <td>{{$header->Pelanggan->nama_pelanggan}}</td>
                                        <td> {{$brg->jenis_barang}}</td>
                                        <td>{{$brg->ukuran_barang}}</td>
                                        <td>{{$brg->harga}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <td>Rp.{{number_format($detail->diskon,0,',','.')}}</td>
                                        <td>Rp.{{number_format($detail->total_harga - $header->kurang_bayar,0,',','.')}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach  
                @endforeach
            </tbody>
            <tr>
                <td colspan="8" class="text-center"><b>Total Penjualan</b></td>
                <td>Rp. {{number_format($penjualan,0,',','.')}}</td>
                <td></td>
            </tr>
        </table>
    </div>
</div>
</div>
@endsection
@push('Awal')
        
@endpush
@push('Akhir')
<script>//datatable
    $(document).ready( function () {
        $('#tabele').DataTable();
    });
    
</script>
<script type="text/javascript">
    var windowObjectReference = null; // global variable
    
    function openRequestedPopup(url, windowName) {
     // open the page as popup //
     var page = 'http://www.test.com';
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
         
         // focus on the popup //
         myWindow.focus();
         
         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
    }
    </script>
@endpush
