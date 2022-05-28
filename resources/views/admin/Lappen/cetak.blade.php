<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" > --}}
    <link rel="stylesheet" href="{{asset('assets/dist/css/bootstrap.min.css')}}">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            text-align: center;
            align:center;
        }
        table, th, td {
            border: 1px solid black;
            font-size: 14px;
        }
        th, td {
            padding: 10px;
        }
        th {
            background-color: #030303;
            color: white;
        }
        tr:hover {background-color: #b8b8b8;}
        .right {
             text-align: right;
        }
    </style>
</head>
<body>
    
    <img src="LJA.jpg" style="float: left; height: 70px width: 80px; margin:auto">
    <div style="margin-left: 16px">
        <div style="font-size: 17px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 14px"> LAPORAN PENJUALAN</div>
        <div style="font-size: 15px; text-align: left "> Periode {{$monthName}} {{$year}}</div>
    </div>
    <br>
    <br>
<div id="printable">
    <div class="container">
        <table class="table " border="1" align="center">
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
                @php $no = 1 @endphp
                {{-- @php
                    $a = 0;
                @endphp --}}
                @foreach ($Trx_header as $header)
                @foreach ($Trx_detail as $detail)
                {{-- @php
                    $a += $detail->total_harga;
                @endphp --}}
                        @if ($header->id_trx == $detail->id_trx)
                            @foreach ($barang as $brg)
                            @if ($detail->barang_id == $brg->kode_barang)
                            <tr>
                                <td>{{$no++}}</td>
                                        <td>{{date('d-m-Y',strtotime($header->tgl_trx))}}</td>
                                        <td>{{$header->Pelanggan->nama_pelanggan}}</td>
                                        <td> {{$brg->jenis_barang}}</td>
                                        <td>{{$brg->ukuran_barang}}</td>
                                        <td>{{$brg->harga}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <td>Rp.{{number_format($detail->diskon,0,',','.')}}</td>
                                        <td>Rp.{{number_format($detail->total_harga,0,',','.')}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach  
                @endforeach
            </tbody>
            <tr>
                <td colspan="8" class="text-center"><b>Total Penjualan</b></td>
                <td>Rp. {{number_format($penjualan,0,',','.')}}</td>
                {{-- <td></td> --}}
            </tr>
        </table>
        <br>
        <br>
        <div style="text-align: center; width: 900px">
            <span style="width: 20px">Batang, {{$tgl}}</span>
            <br>
            <span style="width: 20px">Tanda Tangan</span>
                <br>
                <br>
                <br>
                <br>
                <br>
            <span style="width: 27px">( Rifki Ivanda )</span>
        </div>
    </div>
</div>

</body>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
{{-- <link rel="stylesheet" href="{{asset('asset/dist/css/bootstrap.min.css')}}"> --}}
</html>