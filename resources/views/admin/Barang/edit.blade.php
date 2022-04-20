@extends('layout.template')
@section('title')
    Edit Barang /
@endsection
@section('judul')
<h1 style="color:black">
  <font size="5" face="Century Gothic"><i class="fa fa-shopping-bag" style='font-size:25px;'></i>&nbsp;EDIT BARANG </font>
</h1>
@endsection
@section('content')
<div class="card card-primary">

    <form action="{{route('barang.update',$barang->kode_barang)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body" style="background-color: #5c9aff">
        <div class="form-group row col-6">
          <label for="kode_barang" style="font-size: 15px; color: black">Kode Kayu</label>
          <input style="color: black" type="text" class="form-control" value="{{$barang->kode_barang}}" id="kode_barang" name="kode_barang" placeholder="example : BrgKG01">
        </div>
        <div class="form-group row col-6">
            <label for="jenis_barang" style="font-size: 15px; color: black">Jenis Kayu</label>
            <input style="color: black" type="text" class="form-control" value="{{$barang->jenis_barang}}" id="jenis_barang" name="jenis_barang" placeholder="example : Kayu Glugu">
        </div>
        <div class="form-group row col-6">
            <label for="exampleFormControlSelect1" style="font-size: 15px">Asal Kayu</label>
            <select class="form-control" name="asal_barang" id="asal_barang">
              <option >Pilih Jenis Kayu</option>
              <option style="color: black" value="Lokal"{{$barang->asal_barang == "Lokal" ? 'selected' : '' }}>Lokal</option>
              <option style="color: black" value="Luar"{{$barang->asal_barang == "Luar" ? 'selected' : '' }}>Luar</option>
            </select>
        </div>
        <div class="form-group row col-6">
            <label for="ukuran_barang" style="font-size: 15px; color: black">Ukuran Meter</label>
            <input style="color: black" type="text" class="form-control" value="{{$barang->ukuran_barang}}" id="ukuran_barang" name="ukuran_barang" placeholder="example : 12m">
        </div>
        <div class="form-group row col-6">
            <label for="stok" style="font-size: 15px; color: black">Stok</label>
            <input style="color: black" type="text" class="form-control" value="{{$barang->stok}}" id="stok" name="stok" placeholder="example : 1">
        </div>
        <div class="form-group row col-6">
            <label for="harga" style="font-size: 15px; color: black">Harga</label>
            <input style="color: black" type="text" class="form-control" value="{{$barang->harga}}" id="harga" name="harga" placeholder="example :12000">
        </div>
        <div class="card-footer">
          <button type="submit" onclick="withToastSuccess()" class="btn btn-success " ><i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan</button>
          {{-- <button type="submit" class="btn btn-primary" onclick="withToastSuccess()" >Simpan</button> --}}
          <a href="{{route('barang.index')}}" class="btn btn-danger">Kembali</a>
        </div>
			
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
  });
</script>
@endpush