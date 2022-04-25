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
        table {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                border: 1px solid #000000;
        }
        table, th, td{
            padding: 8px 20px;
            
        }
    </style>
</head>
<body>
    
    <div style="text-align: center">
        <div style="font-size: 20px"> MATERIAL KAYU LANCAR JAYA</div>
        {{-- <div style="font-size: 20px"> LANCAR JAYA</div> --}}
        <div style="font-size: 17px"> JURNAL UMUM</div>
        <div style="font-size: 17px"> Per {{$dt}}</div>
    </div>
    <br>
<div id="printable">
    <div class="container">
        <table class="table" border="" >
            <thead>
                <tr style="background-color: rgb(0, 0, 0); color: white">
                    <th>Tanggal</th>
                    <th>Keterangan</th>
                    <th>Reff</th>
                    <th>Debet</th>
                    <th>Kredit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Jurnalheader as $header)
                    <tr style="background:lightblue;">
                        <td style="text-align: center">{{date('d F Y',strtotime($header->tanggal))}}</td>
                        <td><b>{{$header->keterangan}}</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>

                    @foreach ($Jurnaldetail as $detail)
                        @if ($detail->id_jurnal == $header->id_jurnal)
                            <tr>
                                <td></td>
                                <td>{{$detail->Akun->nama_akun}}</td>
                                <td></td>
                                <td style="text-align: center">{{$detail->debit > 0 ? $detail->debit : null}}</td>
                                <td style="text-align: center">{{$detail->kredit > 0 ? $detail->kredit : null }}</td>
                            </tr>  
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>

</body>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</html>