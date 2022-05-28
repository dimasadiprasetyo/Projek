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
        .a, .b, .c{
            border: 1px solid rgb(255, 255, 255);
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
    
<div id="printable">
    <div class="container">
        <table id="neraca" class="" style=" width: 100%;height: 50%;color: black" border="1">
            <thead>
                <tr>
                    <th colspan="4" class="text-center" id="a" style="background-color: white;color: black">MATERIAL KAYU LANCAR JAYA</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center" id="b" style="background-color: white;color: black">NERACA</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-center" id="c" style="background-color: rgb(173, 1, 1);color: rgb(255, 255, 255)">PERIODE {{$dt}}</th>
                </tr>
                {{-- <tr>
                    <th colspan="4" class="text-center">Periode {{$dt}}</th>
                </tr> --}}
                <tr style="text-align: center" >
                    <th style="background-color: rgb(0, 0, 0); color: white">Kode Akun</th>
                    <th style="background-color: rgb(0, 0, 0); color: white">Nama Akun</th>
                    <th style="background-color: rgb(0, 0, 0); color: white">Debet</th>
                    <th style="background-color: rgb(0, 0, 0); color: white">Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totalDebit = 0;
                    $totalKredit = 0;
                @endphp 
            @foreach ($akuns as $akun)
                @php
                    $d = 0;
                    $k = 0;   
                @endphp
                    @foreach ($Jurnalheader as $header)
                        @foreach ($header->jurnal_detail as $detail)
                            @if ($detail['id_akun'] == $akun['id_akun'])
                                @php
                                    $d += $detail->debit;
                                    $k += $detail->kredit;
                                @endphp
                            @endif
                        @endforeach
                    @endforeach
                        @php
                            if ($d > 0 || $k >0) {
                            }
                        @endphp
                    
                    <tr style="text-align: center">
                        <td>{{$akun->id_akun}}</td>
                        <td>{{$akun->nama_akun}}</td>
                        {{-- <td>Rp.{{number_format($akun->jenis_akun == 'Debet' ? $akun->saldo_akhir : 0,0,',','.')}}</td>
                        <td>Rp.{{number_format($akun->jenis_akun == 'Kredit' ? $akun->saldo_akhir : 0,0,',','.')}}</td> --}}
                        <td>{{number_format($d,0,',','.')}}</td>
                        <td>{{number_format($k,0,',','.')}}</td>
                    </tr>
                    @php
                        $totalDebit += $d;
                        $totalKredit += $k;
                    @endphp
            @endforeach
        </tbody>
        <tr style="text-align: center">
                    <td colspan="2" style="background: rgb(0, 0, 0); color: white"><b>Jumlah</b></td>
                    <td><b>Rp.{{number_format($totalDebit,0,',','.')}}</b></td>
                    <td><b>Rp.{{number_format($totalKredit,0,',','.')}}</b></td>
                    
        </tr>
        </table>
    </div>
</div>
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

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>