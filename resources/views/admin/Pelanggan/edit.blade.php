@extends('layout.template')
@section('title')
    Edit Pelanggan /
@endsection
@section('judul')
<h1 style="color:black">
  <font size="5" face="Century Gothic"><i class="fa fa-user" style='font-size:25px;'></i>&nbsp;EDIT PELANGGAN</font>
 </h1>
@endsection
@section('content')
<div class="card card-primary">
    
    <form action="{{route('pelanggan.update',$pelanggan->kode_pelanggan)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body" style="background-color: #80b0ff">
        <div class="form-group row col-6">
          <label for="kode_pelanggan" style="font-size: 15px; color: black">ID Pelanggan</label>
          <input style="color: black" type="text" readonly value="{{$pelanggan->kode_pelanggan}}" class="form-control" id="kode_pelanggan" name="kode_pelanggan" placeholder="example : PLG001">
        </div>
        <div class="form-group row col-6">
            <label for="nama_pelanggan"style="font-size: 15px" style="color: black">Nama Pelanggan</label>
            <input style="color: black" type="text" value="{{$pelanggan->nama_pelanggan}}" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="example : Murdiyono">
        </div>
        <div class="form-group row col-6">
            <label for="alamat"style="font-size: 15px" style="color: black">Alamat Pelanggan</label>
            <input style="color: black" type="text" value="{{$pelanggan->alamat}}" class="form-control" id="alamat" name="alamat" placeholder="example : Peturen">
        </div>
        <div class="form-group row col-6">
            <label for="telepon" style="font-size: 15px; color: black">Telepon</label>
            <input style="color: black" type="text" value="{{$pelanggan->telepon}}" class="form-control" id="telepon" name="telepon" placeholder="example : 089">
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