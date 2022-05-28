@extends('layout.template')
@section('title')
    Akun /
@endsection

@section('judul')

    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-bitcoin" style='font-size:25px;'></i>&nbsp;DATA AKUN </font>
    </h1>

@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="{{route('akun.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
            </div>
        </div>
        <div class="card-body">
            <div class="card rounded shadow border-0">
                <div class="table-responsive">
                    <table id="example2"  class="table">
                        <thead style="background-color: black; color: white">
                            <tr style="color: white; font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                                <th style="color: white">No</th>
                                <th style="color: white">Nomor Akun</th>
                                <th style="color: white">Nama Akun</th>
                                <th style="color: white">Jenis Akun</th>
                                <th style="color: white">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Akuns as $akun)
                                <tr style="font-size: 15px">
                                    <td>{{$loop->iteration}}</td>
                                    <td >{{$akun->id_akun}}</td>
                                    <td>{{$akun->nama_akun}}</td>
                                    <td>{{$akun->jenis_akun}}</td>
                                    <td>
                                        <a href="{{route('akun.edit',$akun->id_akun)}}" class="btn" style="background-color: #e6ad11">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                                        </a>
                                    </td>
                                </tr>
                    
                            @endforeach
                        </tbody>
                    </table>
                
                </div>
            </div>
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