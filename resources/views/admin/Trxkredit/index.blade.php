@extends('layout.template')
@section('title')
    Create penjualan
@endsection
@section('judul')
<h1 style="color:black">
  <font size="5" face="Century Gothic"><i class="fas fa-store-alt" style='font-size:25px;'></i>&nbsp;TRANSAKSI KREDIT </font>
</h1>  
@endsection
@section('content')
<div class="card" style="background-color: #aeb1b5">
    
    <form action="{{route('detailheaderkredit.index')}}" method="POST" target="_blank">
        @csrf
        <input type="hidden" name="total_bayar" id="total_bayar" value="0">
        
        <div class="card-body" >
            <div class="form-group">
                <label for="id_trx" style="color: black; font-size: 15px">Id Transaksi</label>
                <input type="text" readonly class="form-control" value="{{$id_trx}}" id="id_trx" name="id_trx" >
            </div>
            {{-- row --}}
            <div class="row">
              <div class="form-group col-md-6">
                <label for="tgl_trx" style="color: black; font-size: 15px">Tanggal Transaksi</label>
                <input type="date"  class="form-control" id="tgl_trx" name="tgl_trx" placeholder="example : PLG001" value="{{$tglInput}}">
              </div>
              <div class="form-group col-md-6">
                <label style="color: black; font-size: 15px">Pelanggan</label>
                <select name="kode_pelanggan" id="kode_pelanggan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option disabled selected>-- Pilih Jenis --</option>
                  @foreach ($pelanggans as $pelanggan)
                    <option value="{{$pelanggan->kode_pelanggan}}">{{$pelanggan->nama_pelanggan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="tgl_jatuhtemp" style="color: black; font-size: 15px">Tanggal Jatuh Tempo</label>
                    <input type="date" readonly class="form-control" id="tgl_jatuhtemp" name="tgl_jatuhtemp" >
              </div>
              <div class="form-group col-md-6">
                <label style="color: black; font-size: 15px">Jenis Kayu</label>
                <select name="kode_barang" id="kode_barang" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                  <option disabled selected>-- Pilih Jenis --</option>
                  @foreach ($barangs as $barang)
                    <option value="{{$barang->kode_barang}}">{{$barang->jenis_barang}} / {{$barang->ukuran_barang}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="qty" style="color: black; font-size: 15px">Jumlah</label>
                <input type="number" class="form-control" id="qty"  name="qty" placeholder="0" required>
              </div> 
            </div>

            <button type="button" name="add" id="add" class="btn btn-md mb-3" style="background:green; color: white;" size="3">
              <i class="fa fa-shopping-cart" style="font-size:14px" aria-hidden="true"></i>
              <span style="font-size: 14px"> Keranjang</span>
            </button>
            <br>
            
            <div class="card-body" >
              <div id="notif"></div>
              <div class="card rounded shadow border-0">
                <div class="table-responsive">
                  <table class="table" border="1" id="data">
                      <thead style="background-color: black; color: white">
                          <tr style="font-size: 15px; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">
                              <th style="color: white; font-size: 14px">No </th>
                              <th style="color: white; font-size: 14px">Jenis Kayu</th>
                              <th style="color: white; font-size: 14px">Ukuran kayu</th>
                              <th style="color: white; font-size: 14px">Harga Kayu</th>
                              <th style="color: white; font-size: 14px">Jumlah</th>
                              <th style="color: white; font-size: 14px">Disc</th>
                              <th style="color: white; font-size: 14px">Sub total</th>
                          </tr>
                      </thead>
                      <tbody>
                            {{-- Tbody AJAX --}}
                      </tbody>
                      <tfoot>
                          {{-- <tr><td>kugg</td></tr> --}}
                      </tfoot>
                  </table>
                </div>
              </div>
            </div>


            <div class="row">
              <div class="form-group col-md-6 scroll">
                <label for="bayar_uangmuka" style="color: black; font-size: 15px">Bayar Uang Muka</label>
                <input type="text" class="form-control" style="text-align: right" name="bayar_uangmuka" id="bayar_uangmuka" placeholder="Rp."  required>
              </div>

              <div class="form-group col-md-6 scroll">
                <label for="kurang_bayar" style="color: black; font-size: 15px">Kurang Bayar</label>
                <input type="text"  readonly class="form-control" id="kurang_bayar" style="text-align: right" onkeyup="rupiah(angka)" onchange="rupiah(angka)" name="kurang_bayar" placeholder="readonly">
              </div>

              <div class="form-group col-md-6">
                <label for="ongkos" style="color: black; font-size: 15px">Ongkos Kirim</label>
                <input type="text" class="form-control" id="ongkos" style="text-align: right" name="ongkos" placeholder="Rp." required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              </div>

              <div class="form-group col-md-6 scroll">
                <label for="keterangan" style="color: black; font-size: 15px">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="keterangan" placeholder="example : keterangan"></textarea>
              </div>
            </div>

        </div>
      <!-- /.card-body -->

      <div class="card-footer d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mr-2">
          <i class="fa fa-floppy-o"  style="font-size:17px" id="btn-simpan" disabled aria-hidden="true"></i> Simpan
        </button>
      </div>
    </form>
</div>
@endsection
@push('Akhir')

<script type="text/javascript">
  $(document).ready(()=> {
    detailIndex();
    tanggal();

            var bayar = document.getElementById('bayar_uangmuka','kurang_bayar');
            var ongkos = document.getElementById('ongkos');
            bayar.addEventListener('keyup', function(e){
                bayar.value = formatRupiah(this.value, 'Rp. ');
            })
            ongkos.addEventListener('keyup', function(e){
                ongkos.value = formatRp(this.value, 'Rp. ');
            })

            function formatRp(angka, prefix){
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

      function reverseRupiah(angka) {
        let deleteRp = angka.replace('Rp. ', '')
        let result = deleteRp.replaceAll('.', '')
        return result
      }

    // keranjang
    $("#add").click(()=> {
      
      console.log("hallo")
      let kode_barang = $('#kode_barang').val();
      let id_trx= $('#id_trx').val();
      let qty= $('#qty').val();
      console.log(qty)
      
      //  stok alert
        $.ajax({
          url: "{{ url('/detailstokkredit') }}/"+kode_barang,
          type: "GET",
            success: (response) => {
              let stok = response.stok
              let result = stok - qty
              console.log(result)
                
                if(result < 0) {
                  $('#notif').append(
                    `<div class="alert alert-danger" 
                      <strong>Peringatan !</strong> Penjualan melebihi Stok ${response.jenis_barang} dengan sisa ${Math.abs(stok)} stok, Silahkan Hapus Data
                      <button class="close" data-dismiss="alert">
                          <span>x</span>
                        </button>
                    </div>`
                  )
                }
                if(result>= 0){
                    // stok
                    $.ajax({
                      url : "{{url('/stokkredit')}}/"+kode_barang,
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
                  //store         
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
                  });
                }
            }
        });       
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
      })

    }

    hapusDetail();    
      function hapusDetail() {
        $(document).on('click', '.btn-hapus', (response)=> {
          if(confirm('Are you sure your want to delete?')){
          let id = $(response.target).attr('data-id')
          console.log(id)
          $.ajax({
            url: "{{url('/deletedetailkredit')}}/"+id,
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
                         <td>${transaksi.barang.ukuran_barang}</td>
                         <td>Rp.${rupiah(transaksi.barang.harga)}</td>
                         <td>${transaksi.qty}</td>
                         <td>Rp.${rupiah(transaksi.diskon)}</td>
                         <td>Rp.${rupiah(transaksi.total_harga)}</td>           
                         </tr>`

              $('tbody').append(row);
              no++;
            });
                          
              var totalPenjualan = `<tr>
                                        <td colspan="6">Total Penjualan</td>
                                        <td>Rp. ${rupiah(transaksis.total_penjualan)}</td>
                                    </tr>`
                                                  
              $('tfoot').append(totalPenjualan);
              $('#total_bayar').val(transaksis.total_penjualan);
              $('#kurang_bayar').val(transaksis.total_penjualan);
          }
      });
    }


      //  bayar uang muka
       $('#bayar_uangmuka').keyup(()=> {
        let id_trx = $('#id_trx').val();
        let dp = $('#bayar_uangmuka').val();
        console.log(dp)
        

          $.ajax({
             url: "{{ url('/detailkurangbayar') }}/"+id_trx,
             type: "GET",
             dataType: "JSON",
              success: (data) => {
                let total = data.total
                let kurang = total - (reverseRupiah(dp));
                if (kurang > 0) {
                    $("#kurang_bayar").val(`Rp. ${rupiah(kurang)}`);
                    console.log(kurang)
                    $("#kurang_bayar").removeClass('is-invalid');
                    $("#btn-simpan").prop('disabled', false);
                } else {
                    $("#kurang_bayar").val(`Jumlah Uang Muka Terlalu Banyak`);
                    $("#kurang_bayar").addClass(`is-invalid`);
                    $("#btn-simpan").prop(`disabled`, true);
                }
              },

          });
      });

      



      //tutup Script 
  });
</script>
@endpush