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
<a href="" target="_blank" class="btn btn-primary waves-effect"> <i class="fas fa-plus-circle"></i> <span>Cetak</span> </a>
</div>
</div>
</div>
@endsection