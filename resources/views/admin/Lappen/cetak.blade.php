<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    {{-- <link rel="stylesheet" href="{{asset('asset/dist/css/bootstrap.min.css')}}" > --}}
    <title>Document</title>
    <style>
          body {
            padding: 5px;
            position: relative;
            width: 100%;
            height: 100%;
        }
        table {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            border-collapse: collapse;
            position: relative;
            width: 5px;
            border: 1px solid #000000;
        }
        table, th, td{
                /* padding: 2px 5px; */
                text-align: left;
        }        
        table .tr1 th{
                background: #111111;
                color: #fff;
                font-weight: normal;

            }
        table tr:hover {
            background-color: #8b1818;
        }
        table tr:nth-child(even) {
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
    
    <div style="text-align: center">
        <div style="font-size: 20px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 17px"> LAPORAN PENJUALAN</div>
        <div style="font-size: 17px"> PER {{$dt}} </div>
    </div>
    <br>
<div id="printable">
    <div class="container">
        <table class="table " border="1" >
            <!--Judul Tabel -->
            <thead>
                <tr class="tr1">
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
                @php $no = 1 @endphp
                @foreach ($Trx_header as $header)
                @foreach ($Trx_detail as $detail)
                        @if ($header->id_trx == $detail->id_trx)
                            @foreach ($barang as $brg)
                            @if ($detail->barang_id == $brg->kode_barang)
                            <tr>
                                <td>{{$no++}}</td>
                                        <td>{{date('d-m-Y',strtotime($header->tgl_trx))}}</td>
                                        <td> {{$brg->jenis_barang}}</td>
                                        <td>{{$brg->ukuran_barang}}</td>
                                        <td>{{$brg->harga}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <td>Rp.{{number_format($detail->diskon,0,',','.')}}</td>
                                        <td>Rp.{{number_format($header->total_bayar,0,',','.')}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach  
                @endforeach
            </tbody>
        
        </table>
    </div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>