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
    
    <div style="text-align: left">
        <div style="font-size: 20px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 16px"> Jl. Mayjend Sutoyo, Denasri Kulon -Batang</div>
        <div style="font-size: 16px"> Telepon : 0815427890,0989318636</div>
    </div>
    <br>
    <div id="printable">
        <hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">
<h3 align="center" style="font-size: 29px">Nota Penjualan</h3>
<hr style="border: 0.2px solid black; margin: 10px 5px 10px 5px;">
<table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">
  <thead>
  <tr>
    <td  class="left">No. Transaksi</td>
    <td class="left kop">{{$id_trx}}</td>
    <td></td>
    <td  class="left">Tanggal</td>
    <td colspan="2" class="left kop">{{$tgl_trx}}</td>
  </tr>
  <tr>
    <td  class="left">Nama Pelanggan</td>
    <td class="left kop">{{$kode_pelanggan}}</td>
    <td></td>
    <td  class="left">Tanggal Jatuh Tempo</td>
    <td colspan="2" class="left kop">{{$tgl_jatuhtemp}}</td>
  </tr>
  <tr>
    <td  class="left">Alamat</td>
    <td  class="left kop">{{$alamat}}</td>
    <td></td>
    <td  class="left">Keterangan</td>
    <td colspan="2" class="left kop">{{$keterangan}}</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  </thead>
  <tbody>
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Qty</th>
      <th>Harga</th>
      <th>Diskon</th>
      <th>Total</th>
    </tr>
    @foreach ($transaksiDetail as $detail)
    <tr>
      <td>{{$loop->iteration}}</td>
      <td>{{$detail->Trx_detail->barang->jenis_barang}}</td>
      <td align="right">{{$detail->Trx_detail->qty}}</td>
      <td>{{$detail->Trx_detail->barang->harga}}</td>
      <td>{{$detail->Trx_detail->diskon}}</td>
    <td> {{$detail->Trx_detail->total_harga}}</td>
    </tr>
    @endforeach
    <tr>
      <th colspan="5"> UANG MUKA/DP</th>
      <td>{{$uangmuka}}</td>
      
    </tr>
    <tr>
      <th colspan="5"> TOTAL KURANG</th>
      <td>{{$total_bayar}}</td>
      
    </tr>
  </tbody>
  <tfoot>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr class="ttd">
      <th colspan="2">Customer</th>
      <th colspan="2"></th>
      <th colspan="2">Hormat Kami</th>
    </tr>
    <tr>
      <td colspan="2">(................................)</td>
      <td colspan="2"></td>
      <td colspan="2">(Lancar Jaya)</td>
    </tr>
  </tfoot>
</table>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>