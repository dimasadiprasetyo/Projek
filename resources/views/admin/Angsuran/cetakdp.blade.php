<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >

		<title>Document</title>
		<style>
			*{
				box-sizing: border-box;
				font-size: 18px;
				font-family: Times New Roman;
			}
			body{
				background-color: #ffffff;
			}
			.margin{
				background-color: #fff;
				width: 80%;
				margin: 20px auto;
				box-shadow: 0 1px 1px 0 #ccc;
				padding: 40px 60px;
			}
			table{
				width: 100%;
				border-collapse: collapse;
			}
			table .td1{
				background: rgba(20, 20, 20, 0.767)
				width: 20%;
				height: 7%;
			}
			td:first-child {
				width: 30%;
			}
			td{
				padding: 10px;
			}
			h4{
				font-size: 25px;
			}
			h1{
				font-size: 30px;
			}
		</style>
	</head>
	
	<body style="font-size: 5px">
		<table width="300" border="0" cellpadding="2" cellspacing="0" style="border: 1px solid #000;">  
			<tr> 
				 
				<td rowspan="6" width="100" class="td1" style="border-right:1px solid #000;text-align: center;"> </td>  
				<td width="120" valign="top" ></td>  
				<td valign="top" colspan="2" >Tanggal : {{date('d F Y',strtotime($Trxcetak->tgl_trx))}} </td>  
                
			</tr>  
			<tr>
				<td valign="top" > No transaksi </td>  
				<td valign="top" > : {{$Trxcetak->id_trx}} </td>
				<td valign="top">  </td>
			</tr>
			<tr>  
				<td valign="top" > Telah Diterima Dari </td>  
				<td valign="top" > : {{$Trxcetak->Pelanggan->nama_pelanggan}}</td>  
				<td valign="top">  </td>
			</tr> 

			<tr>  
				<td valign="top" > Uang Sejumlah </td>  
				<td valign="top" colspan="2" id="terbilang-output" > : <i><strong>{{terbilang($Trxcetak->total_bayar - $Trxcetak->kurang_bayar)}}</strong></i> </td>  
			</tr>  
			
			<tr>  
				<td valign="top" > Untuk Pembayaran </td>  
				<td valign="top" > : Dp Pembeliaan </td>  
				<td valign="top">  </td>
			</tr> 

			<tr>  
				<td valign="bottom" colspan="3"  style="background-color: rgb(54, 54, 54);color: white"  id="terbilang-input" class="mata-uang" onkeyup="inputTerbilang();"> <h3>Rp {{number_format($Trxcetak->total_bayar - $Trxcetak->kurang_bayar,0,',','.')}},-</h3> </td>  
				  
			</tr>  
		</table>  
		<style>  
			a { text-decoration: none; color: #0903E8; font-family: verdana; }  
			a:hover { color: #FA3C3C; }  
		</style>  
	
	</body>
	<script src="{{asset('assets/js/terbilang.js')}}"></script>
	<script>
		function inputTerbilang(){
			 //membuat inputan otomatis jadi mata uang
			 $('.mata-uang').mask('0.000.000.000', {reverse: true});

			//mengambil data uang yang akan dirubah jadi terbilang
			var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

			//menampilkan hasil dari terbilang
			document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
		}
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>