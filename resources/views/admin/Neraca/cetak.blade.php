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
	max-width: 100%;
	max-height: 100%;
}
body {
	padding: 5px;
	position: relative;
	width: 100%;
	height: 100%;
}
table th,
table td {
	padding: .625em;
  text-align: center;
}
table .kop:before {
	content: ': ';
}
.left {
	text-align: left;
}
table #caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table.border {
  width: 100%;
  border-collapse: collapse
}

table.border tbody th, table.border tbody td {
  border: thin solid #000;
  padding: 2px
}
.ttd td, .ttd th {
	padding-bottom: 4em;
}
    </style>
</head>
<body>
    
<div id="printable">
    <table id="neraca" class="" style=" width: 100%;height: 50%;color: black" border="1">
        <thead>
            <tr>
                <th colspan="4" class="text-center">MATERIAL LANCAR JAYA</th>
            </tr>
            <tr>
                <th colspan="4" class="text-center">NERACA</th>

            </tr>
            <tr>
                <th colspan="4" class="text-center">Periode {{$dt}} </th>
            </tr>
            <tr style="text-align: center">
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
                        <td>{{$akun->jenis_akun == 'Debet' ? $totalDebet : 0}}</td>
                        <td>{{$akun->jenis_akun == 'Kredit' ? $totalKredit : 0}}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
        <tr style="text-align: center">
                    <td colspan="2" style="background: grey"><b>Jumlah</b></td>
                    <td><b>{{$totalDebet}}</b></td>
                    <td><b>{{$totalKredit}}</b></td>
                    
        </tr>
    </table>  
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>