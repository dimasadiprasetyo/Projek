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
          <input type="text" class="form-control {{ $errors->has('kode_barang') ? ' is-invalid' : '' }}" id="kode_barang" name="kode_barang" placeholder="example : BrgKG01">
          @if($errors->has('kode_barang'))
                <span class="invalid-feedback">{{ $errors->first('kode_barang') }}</span>
          @endif
        </div>
        <div class="form-group row col-6">
            <label for="jenis_barang" style="font-size: 15px;color: black">Jenis Kayu</label>
            <input type="text" class="form-control {{ $errors->has('jenis_barang') ? ' is-invalid' : '' }}" id="jenis_barang" name="jenis_barang" placeholder="example : Kayu Glugu">
            @if($errors->has('jenis_barang'))
                <span class="invalid-feedback">{{ $errors->first('jenis_barang') }}</span>
            @endif
        </div>
        <div class="form-group row col-6">
            <label for="exampleFormControlSelect1" style="font-size: 15px; color: black">Asal Kayu</label>
            <select class="form-control" name="asal_barang" id="asal_barang">
              <option >Pilih Jenis Kayu</option>
              <option value="Lokal">Lokal</option>
              <option value="Luar">Luar</option>
            </select>
        </div>
        <div class="form-group row col-6">
            <label for="ukuran_barang" style="font-size: 15px; color: black">Ukuran Meter</label>
            <input type="text" class="form-control {{ $errors->has('ukuran_barang') ? ' is-invalid' : '' }}" id="ukuran_barang" name="ukuran_barang" placeholder="example : 12m">
            @if($errors->has('ukuran_barang'))
                <span class="invalid-feedback">{{ $errors->first('ukuran_barang') }}</span>
            @endif
        </div>
        <div class="form-group row col-6">
            <label for="stok" style="font-size: 15px; color: black">Stok</label>
            <input type="text" class="form-control {{ $errors->has('stok') ? ' is-invalid' : '' }}" id="stok" name="stok" placeholder="example : 1">
            @if($errors->has('stok'))
                <span class="invalid-feedback">{{ $errors->first('stok') }}</span>
            @endif
        </div>
        <div class="form-group row col-6">
            <label for="harga" style="font-size: 15px; color: black">Harga</label>
            <input type="text" class="form-control {{ $errors->has('harga') ? ' is-invalid' : '' }}" id="harga" name="harga" placeholder="example :12000">
            @if($errors->has('harga'))
              <span class="invalid-feedback">{{ $errors->first('harga') }}</span>
            @endif
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
    });
</script>
@endpush