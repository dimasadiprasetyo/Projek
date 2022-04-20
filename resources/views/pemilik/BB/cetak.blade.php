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
    
    <div style="text-align: center">
        <div style="font-size: 20px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 17px"> BUKU BESAR</div>
        <div style="font-size: 17px"> Per </div>
    </div>
    <br>
<div id="printable">
    @foreach($akuns as $akun)
<div style="margin-top: 50px;">
    <div class="card">
        <div class="card-body">
            <div class="row mt-6">
                <div class="col-8">
                    <span class="text-left">Nama Akun : {{$akun->nama_akun}} </span>
                </div>
                <div class="col-6">
                    <span class="text-right">No Akun : {{$akun->id_akun}} </span>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-stripped">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Reff</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($Jurnalheader as $header)
                            @foreach($header->jurnal_detail as $detail)
                                @if($detail->id_akun == $akun->id_akun) 
                                    <tr>
                                        <td>{{$header->tanggal}}</td>
                                        <td>{{$header->keterangan}}</td>
                                        <td>{{$detail->id_jurnal}}</td>
                                        <td>{{$detail->debit}}</td>
                                        <td>{{$detail->kredit}}</td>
                                        <td>{{$total +=($detail->debit - $detail->kredit)}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>