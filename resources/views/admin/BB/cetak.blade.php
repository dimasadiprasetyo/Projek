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
        <div style="font-size: 12px"> Jl. Mayjend Sutoyo, Denasri Kulon -Batang</div>
        <div style="font-size: 12px"> Telepon : 0815427890,0989318636</div>
    </div>
    <br>
    <div id="printable">
        <hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">
<h3 align="center">Nota Penjualan</h3>
<hr style="border: 0.2px solid rgb(206, 52, 52); margin: 10px 5px 10px 5px;">
<div style="margin-top: 50px;">
    <div class="card">
        <div class="card-body">
           
              <div class="row mt-4">
                <div class="col-6">
                    <span class="text-left">Nama Akun : </span>
               </div>
               <div class="col-6">
                <span class="text-right">No Akun : </span>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-md" >
                <!--Judul Tabel -->
                <tr>
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Reff</th>
                    <th>Debit</th>
                    <th>Kredit</th>
                    <th>Saldo</th>
                </tr>

                
                    <tr>
                      <td>
                <!-- tanggal -->
                    </td>
                    <td>
                        <!-- keterangan -->
                    </td>
                    <td>
                        <!-- id_jurnal -->
                    </td>
                    <td style="color: green">
                        <!-- debit -->
                    </td>
                    <td style="color: red">
                        <!-- kredit -->
                    </td>
                    
                    <td style="color: red">
                    <!-- total -->
                  </td>
              
                 <td style="color: green">
                  <!-- total -->
              </td>

      </tr>
      

</table>

</div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>