@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; FORM KELOLA LAPORAN </font>
    </h1>
</div>
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
                    <th>Nama Barang</th>
                    <th>Ukuran</th>
                    <th>Harga Satuan</th>
                    <th>Terjual</th>
                    <th>Diskon</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inboxs as $penjualan)
                <tr>
                    <td>
                        {{$loop->iteration}}
                    </td>
                    <td>
                        {{date('d-m-Y',strtotime($penjualan->created_at))}}
                    </td>
                    <td>
                        {{$penjualan->barang->jenis_barang}}
                    </td>
                    <td>
                        {{$penjualan->barang->ukuran_barang}}
                    </td>
                    <td>
                        {{$penjualan->barang->harga}}
                    </td>
                    <td>
                        {{$penjualan->qty}}
                    </td>
                    <td>
                        {{$penjualan->diskon}}
                    </td>
                    <td>
                        {{$penjualan->total_harga}}
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
            
        </table>
    </div>
</div>
</div>
@endsection