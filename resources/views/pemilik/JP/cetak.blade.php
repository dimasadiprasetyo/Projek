<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" > --}}
    <link rel="stylesheet" href="{{asset('asset/dist/css/bootstrap.min.css')}}" >
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
                width: 100%;
                border: 1px solid #000000;
        }
        table, th, td{
            padding: 8px 20px;
            
        }
    </style>
</head>
<body>
    
    <img src="LJA.jpg" style="float: left; height: 70px width: 80px; margin:auto">
    <div style="margin-left: 16px">
        <div style="font-size: 17px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 14px"><strong> LAPORAN JURNAL PENJUALAN </strong></div>
        <div style="font-size: 15px; text-align: left "> Periode {{$monthName}} {{$year}}</div>
    </div>
    <br>
    <br>
<div id="printable">
    <div class="container">
        <table class="table" border="" >
            <thead style="background-color: black">
                <tr style="text-align: center">
                    <th style="color: white" rowspan="2">Tanggal</th>
                    <th style="color: white" rowspan="2">Keterangan</th>
                    <th style="color: white" rowspan="2">Reff</th>
                    <th style="color: white">Debet</th>
                    <th style="color: white">Kredit</th>
                </tr>
                <tr>
                    <th style="color: white; text-align-last: center; background-color: rgb(255, 0, 0)">Piutang</th>
                    <th style="color: white; text-align-last: center; background-color: rgb(255, 0, 0)">Penjualan</th>
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
                                        <td style="text-align: center">{{date('d-m-Y',strtotime($header->tgl_trx))}}</td>
                                        <td style="text-align: center">{{$header->Pelanggan->nama_pelanggan}}</td>
                                        <td></td>
                                        <td style="text-align: right">Rp.{{number_format($header->kurang_bayar,0,',','.')}}</td>
                                        <td style="text-align: right">Rp.{{number_format($header->kurang_bayar,0,',','.')}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach  
                @endforeach
                <tr>
                    <td colspan="3"  class="text-center" style="background-color: black; color: white"><b>Total</b></td>
                    <td style="text-align: right">Rp. {{number_format($penjualan,0,',','.')}}</td>
                    <td style="text-align: right">Rp. {{number_format($penjualan,0,',','.')}}</td>
                </tr>
            </tbody>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>