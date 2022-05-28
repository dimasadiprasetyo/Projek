@extends('layout.template')
@section('title')
    Bayar Angsuran/
@endsection

@section('judul')
  <h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fas fa-hand-holding-usd" style='font-size:25px;'></i>&nbsp;FORM ANGSURAN </font>
  </h1>
@endsection

@section('content')
  <div class="card card-primary">
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{route('bayarang.store',$id_trx)}}" method="POST"> 
        @csrf
        <div class="card-body" style="background-color: #349beb;">
          @if (session('message'))
            <div class="alert alert-danger alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>x</span>
                </button>
                  {{session('message')}}
              </div>
            </div>
          @endif
              <div class="form-group">
                  <div id="notif"></div>
                  <label for="kode_angsuran" style="font-size: 15px; color: black">Kode Angsuran</label>
                  <input type="text" value="{{$id_asr}}" readonly class="form-control"  id="kode_angsuran" name="kode_angsuran" >
              </div>
              <div class="form-group">
                  <div id="notif"></div>
                  <label for="id_trx" style="font-size: 15px; color: black">Id Transaksi</label>
                  <input type="text" readonly value="{{$Trxheader->id_trx }}"  class="form-control"  id="id_trx" name="id_trx" >
              </div>
                
                <div class="row">
                  <div class="form-group col-md-6">
                    <div id="notif"></div>
                    <label for="ang_ke" style="font-size: 15px; color: black">Angsurang Ke-</label>
                    <input type="number"  class="form-control"  id="ang_ke" name="ang_ke" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="tgl_jatuhtemp" style="font-size: 15px; color: black">Tanggal Jatuh Tempo</label>
                    <input type="text" readonly value="{{$Trxheader->tgl_jatuhtemp}}" class="form-control" id="tgl_jatuhtemp" name="tgl_jatuhtemp" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="tanggal_ang" style="font-size: 15px; color: black">Tanggal Bayar Angsuran</label>
                    <input type="date" value="{{$tglInput}}" class="form-control" id="tanggal_ang" name="tanggal_ang" placeholder="example : PLG001">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="bayar" style="font-size: 15px; color: black">Bayar</label>
                      <input type="text" class="form-control" id="bayar" name="bayar" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group col-md-6">
                      <label for="kurang_bayar" style="font-size: 15px; color: black">kurang Bayar</label>
                      <input type="text" class="form-control" id="kurang_bayar" value="{{$Trxheader->kurang_bayar}}" name="kurang_bayar" readonly>
                  </div>
              </div>
              
                <button type="submit" name="add" id="add" class="btn btn-md mb-3" style="background: green; color: white;" size="3"><i class="far fa-file"></i> Bayar Angsuran </button>
              

                        <div class="card-body" >
                          <div class="card rounded shadow border-0">
                            <div class="table-responsive">
                              <table class="table table-border;" align="center" width="250%" border="1" id="data">
                                  <thead class="thead-dark" style="background-color: black;color: white">
                                      <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                                          <th style="color: white; font-size: 14px">No </th>
                                          <th style="color: white; font-size: 14px" width="100px">Angsuran Ke- </th>
                                          <th style="color: white; font-size: 14px;" width="150px">Jatuh Tempo</th>
                                          <th style="color: white; font-size: 14px">Bayar Angsuran</th>
                                          <th style="color: white; font-size: 14px">Bayar</th>
                                          <th style="color: white; font-size: 14px">Kurang</th>
                                          <th style="color: white; font-size: 14px">Status</th>
                                          <th style="color: white; font-size: 14px">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <tr style="font-size: 15px">
                                      <td>1</td>
                                      <td>Angs- 1</td>
                                      <td>{{date('d F Y',strtotime($Trxheader->tgl_jatuhtemp))}}</td>
                                      <td>{{date('d F Y',strtotime($Trxheader->created_at))}}</td>
                                      <td>Rp.{{number_format($Trxheader->total_bayar -  $Trxheader->kurang_bayar, 0,',','.')}}</td>
                                      <td>Rp.{{number_format($Trxheader->kurang_bayar, 0, ',','.')}}</td>
                                      <td>{{$Trxheader->status_trx}}</td>
                                      <td>
                                          <a class="btn btn-dark" href="{{route('cetakangdp.index',$Trxheader->id_trx)}}" target="_blank">
                                            <i class="fa fa-print fa-fw" style="font-size: 20px" aria-hidden="true"></i>&nbsp;
                                          </a>
                                      </td>
                                    </tr>

                                    <tr style="font-size: 15px">
                                      @foreach ($angsuran as $piutang)
                                      <tr>
                                          <td>{{$loop->iteration+1}}</td>
                                          <td>Angs- {{$piutang->angsuran_ke}}</td>
                                          <td>{{date('d F Y',strtotime($Trxheader->tgl_jatuhtemp))}}</td>
                                          <td>{{date('d F Y',strtotime($piutang->tanggal_ang))}}</td>
                                          <td>Rp.{{number_format($piutang->jml_bayar, 0, ',','.')}}</td>
                                          <td>Rp.{{number_format($piutang->kurang_bayar - $piutang->jml_bayar,0,',','.')}}</td>
                                          <td>{{$Trxheader->status_trx}}</td>
                                          <td>
                                            <a class="btn btn-dark" href="{{route('cetakang.index',$piutang->kode_angsuran)}}" target="_blank">
                                              <i class="fa fa-print fa-fw" style="font-size: 20px" aria-hidden="true"></i>&nbsp;
                                            </a>
                                          </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                  <tfoot>
                                    {{-- <tr><td>kugg</td></tr> --}}
                                  </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
          </div>
      </form>
  </div>
@endsection


