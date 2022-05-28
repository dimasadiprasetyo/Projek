@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN PENJUALAN-PEMILIK </font>
    </h1>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
<div class="card-body">
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
                                        <td>Rp.{{number_format($detail->total_harga,0,',','.')}}</td>
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
@endpush
