@extends('layout.template')
@section('title')
    Create penjualan
@endsection
@section('judul')
    FORM BAYAR ANGSURAN
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('bayarang.store')}}" method="POST">
        @csrf
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="form-group">
                <div id="notif"></div>
                <label for="kode_angsuran">Kode Angsuran</label>
                <input type="text" value="{{$id_asr}}" readonly class="form-control"  id="kode_angsuran" name="kode_angsuran" >
            </div>
            <div class="form-group">
                <div id="notif"></div>
                <label for="id_trx">Id Transaksi</label>
                <input type="text" readonly value="{{$Trxheader->id_trx }}"  class="form-control"  id="id_trx" name="id_trx" >
            </div>
            <div class="row">
            <div class="form-group col-md-6">
              <div id="notif"></div>
              <label for="jenis_barang">Nama Barang</label>
              <input type="text" readonly value="{{$Trxheader->Trx_detail->barang_id}}" class="form-control"  id="jenis_barang" name="jenis_barang" >
            </div>
            <div class="form-group col-md-6">
              <div id="notif"></div>
              <label for="harga">Harga</label>
              <input type="text" readonly value="{{$Trxheader->total_bayar}}"  class="form-control"  id="harga" name="harga" >
            </div>
          </div>
              
              <div class="row">
                <div class="form-group col-md-6">
                  <div id="notif"></div>
                  <label for="ang_ke">Angsurang Ke-</label>
                  <input type="number"  class="form-control"  id="ang_ke" name="ang_ke" >
              </div>
              <div class="form-group col-md-6">
                  <label for="tgl_jatuhtemp">Tanggal Jatuh Tempo</label>
                  <input type="text" readonly value="{{$Trxheader->tgl_jatuhtemp}}" class="form-control" id="tgl_jatuhtemp" name="tgl_jatuhtemp" >
                </div>
              <div class="form-group col-md-6">
               <label for="tanggal_ang">Tanggal Bayar Angsuran</label>
               <input type="date" value="{{$tglInput}}" class="form-control" id="tanggal_ang" name="tanggal_ang" placeholder="example : PLG001">
             </div>
            <div class="form-group col-md-6">
                <label for="bayar">Bayar</label>
                <input type="text" class="form-control" id="bayar" name="bayar">
              </div>
            <div class="form-group col-md-6">
                <label for="kurang_bayar">kurang Bayar</label>
                <input type="text" class="form-control" id="kurang_bayar" value="{{$Trxheader->kurang_bayar}}" name="kurang_bayar">
              </div>
            </div>
             
              <button type="submit" name="add" id="add" class="btn btn-md mb-3" style="background: #00CED1; color: white;" size="3"><i class="far fa-file"></i> Bayar Angsuran </button>
             

                      <div class="card-body" >
                        <table class="table table-border" id="data">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No </th>
                                    <th>Angsuran Ke- </th>
                                    <th>Tanggal Jatuh Tempo</th>
                                    <th>Tanggal Bayar Angsuran</th>
                                    <th>Bayar</th>
                                    <th>Kurang</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                  1
                                </td>
                                <td>
                                  1
                                </td>
                                <td>
                                  {{$Trxheader->tgl_jatuhtemp}}
                                </td>
                                <td>
                                  {{date('d-m-Y',strtotime($Trxheader->created_at))}}
                                </td>
                                <td>
                                  {{$Trxheader->total_bayar -  $Trxheader->kurang_bayar}}
                                </td>
                                <td>
                                  {{$Trxheader->kurang_bayar}}
                                </td>
                                <td>
                                  {{$Trxheader->status_trx}}
                                </td>
                              </tr>

                              <tr>
                                @foreach ($angsuran as $piutang)
                                <tr>
                                    <td>
                                        {{$loop->iteration+1}}
                                    </td>
                                    <td>
                                        {{$piutang->angsuran_ke}}
                                    </td>
                                    <td>
                                        {{$Trxheader->tgl_jatuhtemp}}
                                    </td>
                                    <td>
                                        {{$piutang->tanggal_ang}}
                                    </td>
                                    <td>
                                        {{$piutang->jml_bayar}}
                                    </td>
                                    <td>
                                        {{$piutang->kurang_bayar - $piutang->jml_bayar}}
                                    </td>
                                    <td>
                                        {{$Trxheader->status_trx}}
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
      <!-- /.card-body -->

      {{-- <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        <a href="" class="btn btn-danger">Kembali</a>
      </div> --}}
    </form>
  </div>
@endsection


