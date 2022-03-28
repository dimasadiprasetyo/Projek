@extends('layout.template')
@section('title')
    Create penjualan
@endsection
@section('judul')
    DATA TUNAI
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('detailheader.index',$id_trx)}}" method="POST">
        @csrf
        <input type="hidden" name="total_bayar" id="total_bayar" value="0">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="form-group">
                <div id="notif"></div>
                <label for="id_trx">Id Transaksi</label>
                <input type="text" readonly class="form-control" value="{{$id_trx}}" id="id_trx" name="id_trx" >
            </div>
              <div class="row">
             <div class="form-group col-md-6">
               <label for="tgl_trx">Tanggal Transaksi</label>
               <input type="date"  class="form-control" id="tgl_trx" name="tgl_trx" placeholder="example : PLG001" value="{{$tglInput}}">
             </div>
             <div class="form-group col-md-6">
               <label>Jenis Kayu</label>
               <select name="kode_barang" id="kode_barang" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                <option disabled selected>-- Pilih Jenis --</option>
                @foreach ($barangs as $barang)
                  <option value="{{$barang->kode_barang}}">{{$barang->jenis_barang}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
                <label for="qty">Jumlah</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="example : PLG001">
              </div>
              <div class="form-group col-md-6 scroll">
                <label for="keterangan">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan"></textarea>
              </div>
            </div> 
            <button type="button" name="add" id="add" class="btn btn-md mb-3" style="background: #00CED1; color: white;" size="3"><i class="far fa-file"></i> Tambahkan Keranjang </button>


                      <div class="card-body" >
                        <table class="table table-border" id="data">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No </th>
                                    <th>Jenis Kayu</th>
                                    <th>Harga Kayu</th>
                                    <th>Jumlah</th>
                                    <th>Disc</th>
                                    <th>Sub total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tfoot>
                              {{-- <tr><td>kugg</td></tr> --}}
                            </tfoot>
                        </table>
                    </div>
                    </div>
      <!-- /.card-body -->

      <div class="card-footer d-flex justify-content-end">
        <button onclick="withToastSuccess()" type="submit" class="btn btn-primary mr-2">Simpan</button>
        <a href="{{route('daftartrx.index')}}" class="btn btn-danger">Daftar Transaksi</a>
      </div>
    </form>
  </div>
@endsection
@push('Akhir')

  <script type="text/javascript">
    $(document).ready(()=> {
      detailIndex();
     
      // keranjang
      $("#add").click(()=> {
          let kode_barang = $('#kode_barang').val();
          let id_trx= $('#id_trx').val();
          let qty= $('#qty').val();
          console.log(qty)
          // stok alert
            $.ajax({
              url: "{{ url('/detailstok') }}/"+kode_barang,
              type: "GET",
              success: (response) => {
                let stok = response.stok
                let result = stok - qty
                console.log(result)
                
                if(result < 0) {
                  $('#notif').append(
                    `<div class="alert alert-danger" role="alert">
                     Stok ${response.jenis_barang} sisa ${result}
                     </div>`
                  )
                }
                // stok
                $.ajax({
                  url : "{{url('/stok')}}"+kode_barang,
                  type: "POST",
                  data :{
                    _token: "{{ csrf_token() }}",
                    _method: "PUT",
                    stok : result
                  },
                  
                  success:() => {
                    console.log("update barang berhasil")
                  }
                })
              }
            });

            $.ajax({
              url : "{{route('detailtunai.store')}}",
              method: "POST",
              data : {
                _token: "{{ csrf_token() }}",
                 kode_barang: kode_barang,
                 id_trx :id_trx,
                 qty : qty,
              },
              success : (result)=> {
                console.log("berhasil")
                detailIndex()
              }
            });
      });

      function detailIndex(){
        let id_trx = $('#id_trx').val();
          $('tbody').html('');
          $('tfoot').html('');
          let no = 1;
            $.ajax({
              url: "{{ url('/detailindex') }}/"+id_trx,
              type: 'GET',
              dataType: 'json',
              success: (transaksis) => {
                transaksis.trx_detail.forEach((transaksi) => {

                  var row = `<tr>
                          <td>${no}</td>
                          <td>${transaksi.barang.jenis_barang}</td>
                          <td>${transaksi.barang.harga}</td>
                          <td>${transaksi.qty}</td>
                          <td>${transaksi.diskon}</td>
                          <td>${transaksi.total_harga}</td>
                          <td>
                            <form action="{{url('/deletedetail')}}/${transaksi.id}" class="d-inline" method="POST" id="del-${transaksi.id}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm" data-confirm="Hapus Data?|Apakah Anda Yakin?" data-confirm-yes="submitDel(${transaksi.id})">
                                    Hapus
                              </button>
                            </form>
                          </td>           
                            </tr>`
                  $('tbody').append(row);
                  no++;
                });
                var totalPenjualan = `<tr>
                                          <td colspan="5" name="total_bayar">Total Penjualan</td>
                                          <td>Rp. ${transaksis.total_penjualan}</td>

                                     </tr>`
                        $('tfoot').append(totalPenjualan)
                        $('#total_bayar').val(transaksis.total_penjualan);
              }
            });
      }
      // tutp
    });

  </script>
@endpush

