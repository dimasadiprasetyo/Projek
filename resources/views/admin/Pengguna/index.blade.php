@extends('layout.template')
@section('title')
    User /
@endsection
@section('judul')
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-user" style='font-size:25px;'></i>&nbsp;DATA PENGGUNA </font>
    </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="{{route('pengguna.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card rounded shadow border-0">
            <div class="table-responsive">
                <table class="table" id="tabel">
                    <thead style="background-color: black; color: white">
                        <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                            <th style="color: white">No</th>
                            <th style="color: white">Name</th>
                            <th style="color: white">Level User</th>
                            <th style="color: white">E-mail</th>
                            <th style="color: white">E-mail Verified</th>
                            <th style="color: white; text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody style="font-size: 15px">
                        @foreach ($pengguna as $user)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->level}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->email_verified_at}}</td>
                            <td style="text-align: center">
                                <a href="{{route('pengguna.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</a>
                                    <form action="{{route('pengguna.delete',$user->id)}}" class="d-inline delete" method="POST"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus user tersebut?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-id="{{$user->id}}">
                                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>&nbsp;
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