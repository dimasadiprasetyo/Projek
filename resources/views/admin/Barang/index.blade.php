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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Barangs as $barang)
                        <tr style="font-size: 15px">
                            <td style="text-align: center">{{$loop->iteration}}</td>
                            <td>{{$barang->kode_barang}}</td>
                            <td>{{$barang->jenis_barang}}</td>
                            <td style="text-align: center">{{$barang->asal_barang}}</td>
                            <td style="text-align: center">{{$barang->ukuran_barang}}</td>
                            <td>{{$barang->stok}}</td>
                            <td>Rp.{{number_format($barang->harga,0,',','.')}}</td>
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