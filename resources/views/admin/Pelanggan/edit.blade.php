@extends('layout.template')
@section('title')
    Edit Pelanggan /
@endsection
@section('judul')
   <h4>FORM PELANGGAN</h4>
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('pelanggan.update',$pelanggan->kode_pelanggan)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <h5>EDIT DATA</h5>
        <br>
        <br>
        <div class="form-group row col-6">
          <label for="kode_pelanggan">ID Pelanggan</label>
          <input type="text" readonly value="{{$pelanggan->kode_pelanggan}}" class="form-control" id="kode_pelanggan" name="kode_pelanggan" placeholder="example : PLG001">
        </div>
        <div class="form-group row col-6">
            <label for="nama_pelanggan">Nama Pelanggan</label>
            <input type="text" value="{{$pelanggan->nama_pelanggan}}" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="example : Murdiyono">
          </div>
          <div class="form-group row col-6">
            <label for="alamat">Alamat Pelangggan</label>
            <input type="text" value="{{$pelanggan->alamat}}" class="form-control" id="alamat" name="alamat" placeholder="example : Peturen">
          </div>
          <div class="form-group row col-6">
            <label for="telepon">Telepon</label>
            <input type="text" value="{{$pelanggan->telepon}}" class="form-control" id="telepon" name="telepon" placeholder="example : 089">
          </div>
    
      
				</table>
			
		</div>
      <div class="card-footer">
        <button onclick="withToastSuccess() type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('pelanggan.index')}}" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
@endsection