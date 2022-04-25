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
            .neraca {
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #000000;
            }
            .neraca .td1{
                border: 1px #000000;
            }
            .neraca tr th{
                background: #ffffff;
                color: rgb(0, 0, 0);
                font-weight: normal;
            }
            .neraca .tr1 th{
                background: #111111;
                color: #fff;
                font-weight: normal;
            }
            .neraca, th, td{
                padding: 8px 20px;
                text-align: center;
            }        
            .neraca .tr1:hover {
                background-color: #9c9a9a;
            }
            .neraca .tr1:nth-child(even) {
                background-color: #d62e2e;
            }
           
    </style>
</head>
<body>
    
<div id="printable">
    <div class="container">
        <table id="neraca" class="neraca">
            <tr>
                <th colspan="4" style="text-align: center">MATERIAL KAYU LANCAR JAYA</th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: center">LAPORAN NERACA</th>
            </tr>
            <tr>
                <th colspan="4" style="text-align: center">PERIODE {{$dt}}</th>
            </tr>
            <thead>
                <tr style="text-align: center" class="tr1">
                    <th>Kode Akun</th>
                    <th>Nama Akun</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                @php 
                $totalDebet = 0;
                $totalKredit = 0;
                @endphp
                @foreach ($akuns as $akun)
                    @if($akun->saldo_akhir > 0)
                        @php
                            $d = 0;
                            $k = 0;   
                        @endphp
                        @foreach ($Jurnalheader as $header)
                            @foreach ($header->jurnal_detail as $detail)
                                @php
                                    $d += $detail->debit;
                                    $k += $detail->kredit;
                                @endphp
                            @endforeach
                        @endforeach
                        @php
                        $totalDebet += $d;
                        $totalKredit += $k;
                        @endphp
                        
                        <tr style="text-align: center">
                            <td>{{$akun->id_akun}}</td>
                            <td>{{$akun->nama_akun}}</td>
                            <td class="td1">Rp.{{number_format($akun->jenis_akun == 'Debet' ? $totalDebet : 0,0,',','.')}}</td>
                            <td>Rp.{{number_format($akun->jenis_akun == 'Kredit' ? $totalKredit : 0,0,',','.')}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            <tr style="text-align: center">
                        <td colspan="2" style="background: rgb(0, 0, 0);color: white"><b>Jumlah</b></td>
                        <td style="color: rgb(0, 0, 0)"><b>Rp. {{number_format($totalDebet,0,',','.')}}</b></td>
                        <td style="color: rgb(252, 0, 0)"><b>Rp. {{number_format($totalKredit,0,',','.')}}</b></td>
                        
            </tr>
        </table>  
    </div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>