@extends('layout.template')
@section('title')
    Create penjualan
@endsection
@section('judul')
    DATA KREDIT
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('detailheaderkredit.index')}}" method="POST">
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
        {{-- row --}}
        <div class="row">
          <div class="form-group col-md-6">
            <label for="tgl_trx">Tanggal Transaksi</label>
            <input type="date"  class="form-control" id="tgl_trx" name="tgl_trx" placeholder="example : PLG001" value="{{$tglInput}}">
          </div>
          <div class="form-group col-md-6">
            <label>Pelanggan</label>
            <select name="kode_pelanggan" id="kode_pelanggan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
            <option disabled selected>-- Pilih Jenis --</option>
            @foreach ($pelanggans as $pelanggan)
              <option value="{{$pelanggan->kode_pelanggan}}">{{$pelanggan->nama_pelanggan}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="tgl_jatuhtemp">Tanggal Jatuh Tempo</label>
                <input type="date" readonly class="form-control" id="tgl_jatuhtemp" name="tgl_jatuhtemp" >
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
            <input type="number" class="form-control" id="qty" name="qty" placeholder="example : 1-100">
          </div>
          <div class="form-group col-md-6 scroll">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" placeholder="example : keterangan"></textarea>
          </div> 
        </div>
        <label class="center"> <h4> INPUT UANG MUKA</h4></label>
        <div class="row">
          <div class="form-group col-md-6 scroll">
            <label for="bayar_uangmuka">Bayar Uang Muka</label>
            <textarea class="form-control" name="bayar_uangmuka" id="bayar_uangmuka" placeholder="example : keterangan"></textarea>
          </div>
          <div class="form-group col-md-6 scroll">
            <label for="kurang_bayar">Kurang Bayar</label>
            <input type="text" readonly class="form-control" id="kurang_bayar" name="kurang_bayar" placeholder="readonly">
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
        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
        <a href="" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
@endsection
@push('Akhir')
    {{-- <script >
        const id_trx = document.getElementById('id_trx');
        id_trx.value = Date('dd-mm-YYYY');
    </script> --}}
    <script type="text/javascript">
      $(document).ready(()=> {
      detailIndex();
      tanggal();

      $("#add").click(()=> {
        cek_stok()
        console.log("hallo")
        let kode_barang = $('#kode_barang').val();
        let id_trx= $('#id_trx').val();
        let qty= $('#qty').val();
        

        $.ajax({
          url : "{{route('detailkredit.store')}}",
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
        })
      });
      // tgl
      function tanggal(){
        var tgl_pilih = $("#tgl_trx").val();
        var d = new Date(tgl_pilih);
        date = [
          d.getFullYear(),
          ('0' + (d.getMonth() + 2)).slice(-2),
          ('0' + d.getDate()).slice(-2)
        ].join('-');
        d.setMonth(d.getMonth() + 1);
        $("#tgl_jatuhtemp").val(date);
              $(document).on('change', '#tgl_trx', function() {
                var tgl_pilih = $(this).val();
                var d = new Date(tgl_pilih);
                date = [
                  d.getFullYear(),
                  ('0' + (d.getMonth() + 2)).slice(-2),
                  ('0' + d.getDate()).slice(-2)
                ].join('-');
                console.log(date);
                $("#tgl_jatuhtemp").val(date);
                // if(d.getMonth() > 9) {
                //   var monthTrx = d.getMonth()+1
                // } else {
                //   var monthTrx = `0${d.getMonth()+1}`
                // }
                // // d.setMonth(d.getMonth() + 1);
                // let tglTrx = `${d.getYear()}-${monthTrx}-${d.getDay()}`
                // console.log(tglTrx);
              })

      }
    // load
      function detailIndex(){
        let id_trx = $('#id_trx').val();
        $('tbody').html('');
        $('tfoot').html('');
        let no = 1;
        $.ajax({
          url: "{{ url('/detailindexkredit') }}/"+id_trx,
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
                        </tr>`

              $('tbody').append(row);
              no++;
            });
            
            var totalPenjualan = `<tr>
                                          <td colspan="5">Total Penjualan</td>
                                          <td>Rp. ${transaksis.total_penjualan}</td>

                                    </tr>`
                                    
            $('tfoot').append(totalPenjualan);
            $('#total_bayar').val(transaksis.total_penjualan);
            $('#kurang_bayar').val(transaksis.total_penjualan);
          }
        });
      }

      function cek_stok() {
        let jml = $("#qty").val();
        let brg = $("#kode_barang").val();
        //  console.log(stok, brg);
     $.ajax({
       url: "{{ url('/detailstokkredit') }}/"+brg,
       type: "GET",
       dataType: 'JSON',
       success: (response) => {
         console.log(response)
         let stok = response.stok;
         console.log(stok)
         console.log(jml)
         let total = stok - jml;
         
         if (total < 0) {
          $('#notif').append(
            `<div class="alert alert-danger" role="alert">
                Stok ${response.jenis_barang} sisa ${stok}
            </div>`
          )
           $("#qty").val(null);
         }

       }
     });
   }

   $('#bayar_uangmuka').keyup(()=> {
     let id_trx = $('#id_trx').val();
     let dp = $('#bayar_uangmuka').val();
     $.ajax({
       url: "{{ url('/detailkurangbayar') }}/"+id_trx,
       type: "GET",
       dataType: "JSON",
       success: (data) => {
        let total = data.total
        let kurang = total - dp;
         $("#kurang_bayar").val(kurang);
       },

     });
   })


      //tutup Script 
    });
    </script>
@endpush

