@extends('layout.template')
@section('title')
Create penjualan
@endsection
@section('judul')
<h1 style="color:black">
  <font size="5" face="Century Gothic"><i class="fas fa-store-alt" style='font-size:25px;'></i>&nbsp;TRANSAKSI TUNAI
  </font>
</h1>
@endsection

@section('content')
<div class="card " style="background-color: #8bb4f7">

  <form action="{{route('detailheader.index',$id_trx)}}" method="POST">
    @csrf

    <input type="hidden" name="total_bayar" id="total_bayar" value="0">
    <div class="card-body" style="font-size: 14px">
      <div class="container">
        <div class="form-group">
          <label for="id_trx" style="color: black; font-size: 15px">Id Transaksi</label>
          <input type="text" readonly class="form-control" value="{{$id_trx}}" id="id_trx" name="id_trx">
        </div>

        <div class="row">
          <div class="form-group col-md-6">
            <label for="tgl_trx" style="color: black; font-size: 15px">Tanggal Transaksi</label>
            <input type="date" class="form-control" id="tgl_trx" name="tgl_trx" placeholder="example : PLG001"
              value="{{$tglInput}}">
          </div>
          <div class="form-group col-md-6">
            <label style="color: black; font-size: 15px">Jenis Kayu</label>
            <select name="kode_barang" id="kode_barang" class="form-control select2 select2-hidden-accessible"
              style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
              <option disabled selected>-- Pilih Jenis --</option>
              @foreach ($barangs as $barang)
              <option value="{{$barang->kode_barang}}">{{$barang->jenis_barang}} / {{$barang->ukuran_barang}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="qty" style="color: black; font-size: 15px">Jumlah</label>
            <input type="number" class="form-control" id="qty" name="qty" placeholder="0" required
              oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
        </div>

        <button type="button" name="add" id="add" class="btn btn-md mb-3" style="background: green; color: white;">
          <i class="fa fa-shopping-cart" style="font-size:14px" aria-hidden="true"></i><span style="font-size: 14px">
            Keranjang</span>
        </button>
      </div>
      <br>

      <div class="card-body">
        <div id="notif"></div>
        <div class="card rounded shadow border-0">
          <div class="table-responsive">
            <table class="table" border="1" id="data">
              <thead style="background-color: black; color: white">
                <tr
                  style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                  <th style="color: white; font-size: 14px">No </th>
                  <th style="color: white" style="font-size: 14px">Jenis Kayu</th>
                  <th style="color: white" style="font-size: 14px">Ukuran Kayu</th>
                  <th style="color: white" style="font-size: 14px">Harga Kayu</th>
                  <th style="color: white" style="font-size: 14px">Jumlah</th>
                  <th style="color: white" style="font-size: 14px">Disc</th>
                  <th style="color: white" style="font-size: 14px">Sub total</th>
                </tr>
              </thead>
              <tbody>
                {{--Tbody AJAX --}}
              </tbody>
              <tfoot>
                {{-- <tr>
                  <td>kugg</td>
                </tr> --}}
              </tfoot>
            </table>
          </div>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="form-group col-md-6">
            <label for="qty" style="color: black; font-size: 15px">Customer</label>
            <input type="text" class="form-control" id="pelanggan" name="pelanggan" placeholder="example : nama"
              required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>

          <div class="form-group col-md-6">
            <label for="qty" style="color: black; font-size: 15px">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan"
              placeholder="example : keterangan"></textarea>
          </div>

          <div class="form-group col-md-6">
            <label for="ongkos" style="color: black; font-size: 15px">Ongkos Kirim</label>
            <input type="text" class="form-control" id="ongkos" style="text-align: right" name="ongkos"
              placeholder="Rp." required oninvalid="this.setCustomValidity('Data tidak boleh kosong')"
              oninput="setCustomValidity('')">
          </div>
        </div>
      </div>


    </div>
    <!-- /.card-body -->

    <div class="card-footer d-flex justify-content-end">
      <button type="submit" class="btn btn-success mr-2" formtarget="_blank">
        <i class="fa fa-floppy-o print-window" style="font-size:17px"  aria-hidden="true"></i> Simpan
      </button>
      {{-- <a href="{{route('notatunai.index')}}" class="btn btn-dark mr-2">
        <i class="fa fa-print fa-fw" style="font-size:17px" aria-hidden="true"></i> Cetak
      </a> --}}
    </div>
  </form>

</div>
@endsection

@push('Akhir')

<script type="text/javascript">
  $(document).ready(()=> {
      detailIndex();
      
     
            var ongkos = document.getElementById('ongkos');
            ongkos.addEventListener('keyup', function(e){
                ongkos.value = formatRupiah(this.value, 'Rp. ');
            })
            
            function formatRupiah(angka, prefix){
              var 	number_string = angka.replace(/[^,\d]/g, '').toString(),
              split	= number_string.split('.'),
              sisa 	= split[0].length % 3,
              rupiah 	= split[0].substr(0, sisa),
              ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);
              
              if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
              }
	
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

      function rupiah(angka){
        let reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan;
      }


      // keranjang
      $("#add").click(()=> {
        console.log('Halo')  
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
                    `<div class="alert alert-danger"   
                      <strong>Peringatan !</strong> Penjualan melebihi Stok ${response.jenis_barang} dengan sisa ${Math.abs(stok)} stok
                        <button class="close" data-dismiss="alert">
                          <span>x</span>
                        </button>
                    </div>`
                  )
                } 
                else {
                  // stok
                  $.ajax({
                    url : "{{url('/stok')}}/"+kode_barang,
                    type: "PUT",
                    data :{
                      _token: "{{ csrf_token() }}",
                      _method:"POST",
                      stok : result
                    },
                    
                    success:() => {
                      console.log("update barang berhasil")
                    }
                  })
                    // store
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
                }
              }
            });
      });

      hapusDetail();    
      function hapusDetail() {
        $(document).on('click', '.btn-hapus', (response)=> {
          if(confirm('Are you sure your want to delete?')){
          let id = $(response.target).attr('data-id')
          console.log(id)
          $.ajax({
            url: "{{url('/deletedetail')}}/"+id,
            type: "DELETE",
            data: {
              _token: "{{csrf_token()}}",
              id:id
            },
            success: (result) => {
              detailIndex()
              console.log(result)
            }
          })
          }
        })
      }

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
                          <td style="font-size: 14px">${no}</td>
                          <td style="font-size: 14px">${transaksi.barang.jenis_barang}</td>
                          <td style="font-size: 14px">${transaksi.barang.ukuran_barang}</td>
                          <td style="font-size: 14px" id="rupiah">Rp.${rupiah(transaksi.barang.harga)}</td>
                          <td style="font-size: 14px">${transaksi.qty}</td>
                          <td style="font-size: 14px">Rp.${rupiah(transaksi.diskon)}</td>
                          <td style="font-size: 14px" id="rupiah">Rp.${rupiah(transaksi.total_harga)}</td>           
                            </tr>`
                  $('tbody').append(row);
                  no++;
                });
                var totalPenjualan = `<tr>
                                          <td colspan="6" name="total_bayar" style="font-size: 14px">Total Penjualan</td>
                                          <td  id="rupiah">Rp.${rupiah(transaksis.total_penjualan)}</td>

                                     </tr>`
                        $('tfoot').append(totalPenjualan)
                        $('#total_bayar').val(transaksis.total_penjualan);
                        $('#kembali').val(transaksis.total_penjualan);
              }
            });

      }

      $('#bayar').keyup(()=> {
        let id_trx = $('#id_trx').val();
        let dp = $('#bayar').val();
          $.ajax({
             url: "{{ url('/detailbayar') }}/"+id_trx,
             type: "GET",
             dataType: "JSON",
              success: (data) => {
                let total = data.total
                let kurang = dp-total;
                $("#kembali").val(kurang);
                console.log(data)
              },

          });
      });

      $('.print-window').click(function() {
          window.print();
      });
      // tutp
  });

    function newTab() {
      window.open('https://www.codegrepper.com', '_blank');
    }


</script>
<script>
  function show_my_receipt() {
         
         // open the page as popup //
         var page = 'http://www.test.com';
         var myWindow = window.open(page, "_blank", "scrollbars=yes,width=400,height=500,top=300");
         
         // focus on the popup //
         myWindow.focus();
         
         // if you want to close it after some time (like for example open the popup print the receipt and close it) //
         
        //  setTimeout(function() {
        //    myWindow.close();
        //  }, 1000);
        
       }
</script>
@endpush