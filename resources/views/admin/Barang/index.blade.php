@extends('layout.template')
@section('title')
    Barang /
@endsection
@section('judul')
    {{-- <h1 class="fas fa-bell"> </h1> --}}
    <h1 style="color:black">
        <font size="5" face="Century Gothic"><i class="fa fa-shopping-bag" style='font-size:25px;'></i>&nbsp;DATA BARANG </font>
    </h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between">
            <a href="{{route('barang.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
    </div>
    <div class="card-body">
        <div class="card rounded shadow border-0">
            <div class="table-responsive">
                <table class="table table-border" id="tabel">
                    <thead class="thead-dark" style="background-color: black; color: white">
                        <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                            <th style="color: white">No</th>
                            <th style="color: white">Kode Kayu</th>
                            <th style="color: white">Jenis Kayu</th>
                            <th style="color: white">Asal Kayu</th>
                            <th style="color: white">Ukuran /Meter</th>
                            <th style="color: white">Stok</th>
                            <th style="color: white">Harga</th>
                            <th style="color: white; text-align: center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Barangs as $barang)
                        <tr style="font-size: 15px">
                            <td style="text-align: center">{{$loop->iteration}}</td>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->jenis_barang}}</td>
                            <td>{{$barang->asal_barang}}</td>
                            <td>{{$barang->ukuran_barang}}</td>
                            <td>{{$barang->stok}}</td>
                            <td>{{$barang->harga}}</td>
                            <td>
                                <a class="btn btn-warning" href="{{route('barang.edit',$barang->kode_barang)}}" >
                                    <i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit
                                </a>
                                <form action="{{route('barang.destroy',$barang->kode_barang)}}" class="d-inline delete" method="POST"
                                            onsubmit="return confirm('Yakin Anda Ingin menghapus Data?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete" id="delete" data-id="{{$barang->kode_barang}}">
                                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i>&nbsp;Hapus
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
@endpush
@push('Akhir')
<script>
    $(document).ready( function () {
        $('#tabel').DataTable();
    });
    
</script>

<script>
    jQuery(document).ready(function($){
            $('.delete').on('click',function(){
                var getLink = $(this).attr('href');
                swal({
                        title: 'Apakah anda ingin menghapus data?',
                        text: 'Data yang sudah dihapus, tidak akan kembali lai!?',
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        },function(){
                        window.location.href = getLink
                    });
                return false;
            });
        });
</script>
@endpush