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
           font-family: 'Times New Roman', Times, serif;
       }
       table {
           font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
               border-collapse: collapse;
               width: 100%;
               border: 1px solid #000000;
       }
       table, th, td{
           padding: 7px 10px;
           
       }
       table .tr1 th{
               background: #111111;
               color: #fff;
               font-weight: normal;
               text-align: center;
       }
       table .tr2 td{
               background: #111111;
               color: #fff;
               font-weight: normal;
       }
       table .kop:before {
         content: ': ';
       }
       

   </style>
</head>
<body>
    
    <img src="LJA.jpg" style="float: left; height: 70px width: 80px">
    <div style="margin-left: 16px">
          <div style="font-size: 18px"> MATERIAL KAYU LANCAR JAYA</div>
          {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
          <div style="font-size: 13px"> Jl. Mayjend Sutoyo, Denasri Kulon -Batang</div>
          <div style="font-size: 13px"> Telepon : 0815427890,0989318636</div>
    </div>
    <br>
  <div id="printable">
    {{-- <hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;"> --}}
    <h3 align="center">Nota Penjualan</h3>
    {{-- <hr style="border: 0.2px solid black; margin: 10px 5px 10px 5px;"> --}}
    <table border="0" cellpadding="0" cellspacing="0" width="200" class="border" style="overflow-x:auto;">
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
          <tr class="tr1" style="width: 7px; text-align: center">
            <th class="th1" style="width: 7px">No</th>
            <th>Nama Barang</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Diskon</th>
            <th>Total</th>
          </tr>
          @foreach ($transaksidetail as $detail)
          <tr>  
            <td>{{$loop->iteration}}</td>
            <td align="right">{{$detail->barang->jenis_barang}}</td>
            <td align="right">{{$detail->qty}}</td>
            <td>Rp.{{number_format($detail->barang->harga,0,',','.')}}</td>
            <td>Rp.{{number_format($detail->diskon,0,',','.')}}</td>
            <td>Rp.{{number_format($detail->total_harga,0,',','.')}}</td>    
          </tr>
          @endforeach
          <tr>
            <th colspan="5" class="tr2" style="text-align: center; background-color: #cc0101;color: white"> UANG MUKA/DP</th>
            <td style="color: rgb(250, 0, 0)">Rp.{{number_format($uangmuka,0,',','.')}}</td>
            
          </tr>
          <tr>
            <th colspan="5" class="tr2" style="text-align: center; background-color: #000000;color: white"> TOTAL KURANG</th>
            <td style="background-color: red;color: white">Rp.{{number_format($total_bayar,0,',','.')}}</td>
            
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
          <tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr >
            <td></td>
            <td></td>
            <td></td>
            <td></td>
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