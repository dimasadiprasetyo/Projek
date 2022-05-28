@extends('layout.template')
@section('title')
    Tambah Pelanggan /
@endsection
@section('judul')
   <h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fa fa-user" style='font-size:25px;'></i>&nbsp;FORM PELANGGAN</font>
   </h1>
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('pelanggan.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
       @method('POST')
      <div class="card-body" style="background-color: #80b0ff">
        <h5>TAMBAH DATA</h5>
        <br>
        <br>
        <div class="form-group row col-6">
          <label for="kode_pelanggan" style="font-size: 15px;color: black">ID Pelanggan</label>
          <input type="text" class="form-control" id="kode_pelanggan" name="kode_pelanggan" placeholder="example : PLG001" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="nama_pelanggan" style="font-size: 15px; color: black">Nama Pelanggan</label>
            <input type="text" class="form-control " id="nama_pelanggan" name="nama_pelanggan" placeholder="example : Murdiyono" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="alamat" style="font-size: 15px; color: black">Alamat Pelanggan</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="example : Peturen" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group row col-6">
            <label for="telepon" style="font-size: 15px; color: black">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="example : 089" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
        
        <div class="card-footer">
          <button onclick="withToastSuccess() type="submit" class="btn btn-primary">
            <i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan
          </button>
          <a href="{{route('pelanggan.index')}}" class="btn btn-danger">Kembali</a>
        </div>
			
  		</div>
    </form>
  </div>
@endsection