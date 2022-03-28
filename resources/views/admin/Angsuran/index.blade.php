@extends('layout.template')
@section('title')
    Bayar Angsuran /
@endsection
@section('judul')
    <h1 class="fas fa-bell"> DATA ANGSURAN</h1>
@endsection

@section('content')
{{-- <div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="#" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div> --}}
{{-- <div class="card-body"> --}}
    <div class="table-responsive">
    <table class="table table-border" class="table table-striped" id="tabel">
        <thead class="thead-dark">
            <tr>
                <th>
                    No
                </th>
                <th>
                    Id Transaksi
                </th>
                <th>
                    Nama Pelanggan
                </th>
                <th>
                    Tanggal Transaksi
                </th>
                <th>
                    Tanggal Jatuh Tempo
                </th>
                <th>
                    Jumlah Total Bayar
                </th>
                <th>
                    kurang Bayar
                </th>
                <th>
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Trxheader as $header)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    {{$header->id_trx}}
                </td>
                <td>
                    {{$header->Pelanggan->nama_pelanggan}}
                </td>
                <td>
                    {{$header->tgl_trx}}
                </td>
                <td>
                    {{$header->tgl_jatuhtemp}}
                </td>
                <td>{{$header->total_bayar}}</td>
                <td>
                    {{$header->kurang_bayar}}
                </td>
                <td>
                    <a href="{{route('bayarindex.index', $header->id_trx)}}" class="btn btn-warning">Bayar Angsuran</a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
@push('Awal')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">    
@endpush
@push('Akhir')
    <script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>

    <script>
    $(document).ready( function () {
        $('#tabel').DataTable();
    } );
    </script>
@endpush