@extends('layout.template')
@section('title')
    Kategori /
@endsection
@section('judul')
    <h1 class="fas fa-bell"> DATA AKUN <i class="fas fa-dollars"></i></h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="{{route('akun.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
    </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>
                    No
                </th>
                <th>
                    Id Akun
                </th>
                <th>
                    Nama Akun
                </th>
                <th>
                    Jenis Akun
                </th>
                <th>
                    Action
                </th>
              </tr>
              </thead>
        <tbody>
            @foreach ($Akuns as $akun)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    {{$akun->id_akun}}
                </td>
                <td>
                    {{$akun->nama_akun}}
                </td>
                <td>
                    {{$akun->jenis_akun}}
                </td>
                <td>
                    <a href="{{route('akun.edit',$akun->id_akun)}}" class="btn btn-warning">Edit</a>
                        <form action="#" class="d-inline" method="POST">
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