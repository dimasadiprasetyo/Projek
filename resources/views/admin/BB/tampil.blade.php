@extends('layout.template')
@section('title')
    Laporan Penjualan /
@endsection
@section('judul')
<div class="card-header">
    <h1 style="color: #F08080;">
        <font size="5" face="Century Gothic"><i class="fas fa-file-alt" style='font-size:25px;'></i>&nbsp; BUKU BESAR</font>
    </h1>
</div>
    {{-- <h1 class="fas fa-bell"> DATA LAPORAN PENJUALAN</h1> --}}
@endsection
@section('content')
@foreach($akuns as $akun)
<div style="margin-top: 50px;">
    <div class="card">
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-6">
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

        {{-- <div class="table-responsive">
            <table class="table table-bordered table-md" >
                <!--Judul Tabel -->
                @foreach ($Jurnalheader as $jurnal)
                <tr>
                    <td>{{$jurnal->tanggal}}</td>
                    <td>{{$jurnal->keterangan}}</td>
                    <td>{{$jurnal->id_jurnal}}</td>
                    <td style="color: green">#</td>
                    <td style="color: red">#</td>
                    @if ($total < 0)
                        <td style="color: red">{{$total}}</td>
                    @else
                        <td style="color: green">{{$total}}</td>     
                    @endif
                    
                </tr>
                @endforeach    
      

</table> --}}

{{-- </div> --}}
{{-- <a href="" target="_blank" class="btn btn-primary waves-effect"> <i class="fas fa-plus-circle"></i> <span>Cetak</span> </a>
</div>
</div>
</div> --}}
@endsection