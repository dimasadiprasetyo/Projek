@extends('layout.template')
@section('title')
    Kategori /
@endsection
@section('judul')
    <h1 class="fas fa-bell"> DATA PELANGGAN</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="{{route('pelanggan.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
{{-- <div class="card-body"> --}}
    <div class="table-responsive">
    <table class="table table-border" class="table table-striped" id="tabel">
        <thead class="thead-dark">
            <tr>
                <th>
                    No
                </th>
                <th>
                    ID Pelanggan
                </th>
                <th>
                    Nama
                </th>
                <th>
                    Alamat
                </th>
                <th>
                    Telepon
                </th>
                <th>
                    action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Pelanggans as $pelanggan)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    {{$pelanggan->kode_pelanggan}}
                </td>
                <td>
                    {{$pelanggan->nama_pelanggan}}
                </td>
                <td>
                    {{$pelanggan->alamat}}
                </td>
                <td>
                    {{$pelanggan->telepon}}
                </td>
                <td>
                    <a href="{{route('pelanggan.edit', $pelanggan->kode_pelanggan)}}" class="btn btn-warning">Edit</a>
                        <form action="{{route('pelanggan.destroy',$pelanggan->kode_pelanggan)}}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            Hapus
                        </button>
                        </form>
    
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