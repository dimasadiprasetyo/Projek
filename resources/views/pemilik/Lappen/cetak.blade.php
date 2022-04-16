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
        <div style="font-size: 17px"> LAPORAN PENJUALAN</div>
        <div style="font-size: 17px"> PER {{$dt}} </div>
    </div>
    <br>
<div id="printable">
    <table class="table table-bordered " >
        <!--Judul Tabel -->
        <thead>
            <tr>
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
            @foreach ($inboxs as $penjualan)
            <tr>
                <td>
                    {{$loop->iteration}}
                </td>
                <td>
                    {{date('d M Y',strtotime($penjualan->tgl_trx))}}
                </td>
                <td>
                    {{$penjualan->trx_detail->barang->jenis_barang}}
                </td>
                <td>
                    {{$penjualan->trx_detail->barang->ukuran_barang}}
                </td>
                <td>
                    {{$penjualan->trx_detail->barang->harga}}
                </td>
                <td>
                    {{$penjualan->trx_detail->qty}}
                </td>
                <td>
                    {{$penjualan->trx_detail->diskon}}
                </td>
                <td>
                    {{$penjualan->total_bayar}}
                </td>
                
            </tr>
                
            @endforeach
        </tbody>
      
    </table>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>