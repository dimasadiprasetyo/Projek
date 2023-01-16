@extends('layout.template')
@section('title')
    Tambah Barang /
@endsection
@section('judul')
<h1 style="color:black">
  <font size="5" face="Century Gothic"><i class="fa fa-shopping-bag" style='font-size:25px;'></i>&nbsp;FORM BARANG </font>
</h1>
@endsection
@section('content')
<div class="card card-primary">
    <form action="{{route('barang.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body" style="background-color: #5c9aff">
        <h5>TAMBAH DATA</h5>
        <br>
        <br>
        <div class="form-group row col-6">
          <label for="kode_barang" style="font-size: 15px; color: black">Kode Kayu</label>
          <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="example : BrgKG01" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="jenis_barang" style="font-size: 15px;color: black">Jenis Kayu</label>
            <input type="text" class="form-control" id="jenis_barang" name="jenis_barang" placeholder="example : Kayu Glugu" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="exampleFormControlSelect1" style="font-size: 15px; color: black">Asal Kayu</label>
            <select class="form-control" name="asal_barang" id="asal_barang" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')">
              <option value="" selected disabled >--Pilih Jenis Kayu--</option>
              <option value="Lokal">Lokal</option>
              <option value="Luar">Luar</option>
            </select>
        </div>

        <div class="form-group row col-6">
            <label for="ukuran_barang" style="font-size: 15px; color: black">Ukuran Meter</label>
            <input type="text" class="form-control" id="ukuran_barang" name="ukuran_barang" placeholder="example : 12m" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="stok" style="font-size: 15px; color: black">Stok</label>
            <input type="text" class="form-control" id="stok" name="stok" placeholder="0" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="harga" style="font-size: 15px; color: black">Harga</label>
            <input type="text" class="form-control " id="harga" name="harga" style="text-align: right" placeholder="Rp." required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        
        <div class="card-footer">
            <button type="submit" onclick="withToastSuccess()" class="btn btn-success " id="simpan" >
              <i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan
            </button>
            <a href="{{route('barang.index')}}" class="btn btn-danger">Kembali</a>
        </div>
    </form>
</div>
@endsection

@push('Awal')
@endpush
@push('Akhir')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>    

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','.form-control',function(){
            
        });

        var harga = document.getElementById('harga');
              harga.addEventListener('keyup', function(e){
                harga.value = formatRupiah(this.value, 'Rp. ');
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

              function reverseRupiah(angka) {
                let deleteRp = angka.replace('Rp. ', '')
                let result = deleteRp.replaceAll('.', '')
                return result
              }
    });
</script>
@endpush