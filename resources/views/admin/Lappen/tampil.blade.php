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
        
    <a href="{{route('cetaklappen.index')}}" class="btn btn-dark mr-2" >
        <i class="fa fa-print fa-fw"  style="font-size:17px" aria-hidden="true"></i> Cetak
    </a>
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
                @foreach ($inboxs as $penjualan)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{date('d-m-Y',strtotime($penjualan->tgl_trx))}}</td>
                    <td>{{$penjualan->Pelanggan->nama_pelanggan}}</td>
                    {{-- <td>{{$penjualan->trx_detail->barang_id}}</td> --}}
                    {{-- <td>{{$penjualan->Trx_detail->barang->ukuran_barang}}</td> --}}
                    {{-- <td>{{$penjualan->Trx_detail->barang->harga}}</td> --}}
                    <td>{{$penjualan->Trx_detail->qty}}</td><td>{{$penjualan->Trx_detail->diskon}}</td>
                    <td>{{$penjualan->total_bayar}}</td>
                </tr>
                    
                @endforeach
            </tbody>
            
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
