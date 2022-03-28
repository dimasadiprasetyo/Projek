@extends('layouts.template')
@section('title')
    Kategori /
@endsection
{{-- @section('judul')
    <u>PENJUALAN TUNAI</u>
@endsection --}}
@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
        </div>
<div class="card-body">
    <table class="table table-border" id="tabel">
        <thead class="thead-dark">
            <tr>
                <th>
                    No
                </th>
                <th>
                    Nama Kavling
                </th>
                <th>
                    Nama Nasabah
                </th>
                <th>
                    Jumlah Bayar
                </th>
                <th>
                    Tanggal
                </th>
                <th>
                    action
                </th>
            </tr>
        </thead>
        {{-- <tbody style="font-size: 17px">
            @foreach ($penjualantunais as $penjualan)
            <tr>
            <td>
                {{$loop->iteration}}.
            </td>
            <td>
                <strong>{{$penjualan->datakavling->cluster}}{{$penjualan->datakavling->nomorkavling}}</strong>
                <br>
                {{$penjualan->kategori->nama}}
                <br>    
                {{$penjualan->subkategori->namasub}}
                <br>
                <strong>Rp.{{number_format($penjualan->datakavling->hargacash, 0, ',','.')}}</strong>
                <br>
                <a href="#" class="link-primary">Pindah Blok</a>
            </td>
            <td>
                <strong>{{$penjualan->datapembeli->namapembeli}}</strong>
                <br>
                NIK: {{$penjualan->datapembeli->nik}}
                <br>
                Telp: {{$penjualan->datapembeli->telepon}}
                <br>
                <a href="{{route('datapembeli.edit', $penjualan->datapembeli->id)}}" class="link-primary">Perbarui Data Pembeli</a>
            </td>
            <td>
                Tunai Rp.{{number_format($penjualan->bayar, 0, ',','.')}}
                <br>
                Promo Rp.{{number_format($penjualan->promo, 0, ',','.')}}
                <br>
                <a href="#" class="link-primary">Edit Penjualan</a>
            </td>
            <td>
                {{\Carbon\Carbon::parse($penjualan->tertanggal)->isoFormat('D MMMM Y')}}
            </td>
            <td>
                <a href="{{route('tunai.index', $penjualan->id)}}" class="btn btn-xs btn-primary"><i class="fas fa-plus-square"></i></a>
                {{-- <a href="{{route("penjualantunai.kwitansi")}}" target="_blank"><i class="fas fa-print" style="size: 300px"></i></a> --}}
                <form action="#" class="d-inline" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-danger" type="submit">
                        <i class="fas fa-trash-alt fa-1x"></i>    
                    </button>
                    </form>

            </td>
            </tr>    
            @endforeach
            
        </tbody> --}}
    </table>
</div>
</div>
@endsection
@push('Awal')
    <link rel="stylesheet" href="{{asset('asset/dist/css/jquery.dataTables.min.css')}}">    
@endpush
@push('Akhir')
    <script src="{{asset('asset/dist/js/jquery.dataTables.min.js')}}"></script>

    <script>
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
    </script>
@endpush