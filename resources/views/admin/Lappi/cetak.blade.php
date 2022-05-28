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
        <div style="font-size: 14px"> LAPORAN PIUTANG</div>
        <div style="font-size: 15px; text-align: left "> Periode {{$monthName}} {{$year}}</div>
    </div>
    <br>
    <br>
    <div id="printable">
        <div class="container">
            <table class="table " border="1" >
                <!--Judul Tabel -->
                <thead>
                    <tr class="tr1">
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Id Transaksi</th>
                        <th>Nama Pelanggan</th>
                        <th>Penjualan</th>
                        <th>Total Bayar</th>
                        <th>Saldo Piutang</th>
                        <th>Status Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Trxheader as $piutang)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{date('d/m/y',strtotime($piutang->tgl_trx))}}</td>
                        <td>{{$piutang->id_trx}}</td>
                        <td>{{$piutang->Pelanggan->nama_pelanggan}}</td>
                        <td>{{$piutang->jenis_transaksi}}</td>
                        <td>RP.{{number_format($piutang->total_bayar,0,',','.')}}</td>
                        <td>Rp.{{number_format($piutang->kurang_bayar,0,',','.')}}</td>
                        <td>{{$piutang->status_trx}}
                        </td> 
                    </tr>
                        
                    @endforeach
                </tbody>
                <tr>
                    <td colspan="6" class="tr2" style="text-align: center; background-color: black;color: white"><b>Total Piutang</b></td>
                    <td>Rp.{{number_format($totalPiutang,0,',','.')}}</td>
                    <td style="background-color: black"></td>
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>