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
          <label for="kode_pelanggan" style="font-size: 15px">ID Pelanggan</label>
          <input type="text" class="form-control {{ $errors->has('kode_pelanggan') ? ' is-invalid' : '' }}" id="kode_pelanggan" name="kode_pelanggan" placeholder="example : PLG001">
          @if($errors->has('kode_pelanggan'))
              <span class="invalid-feedback">{{ $errors->first('kode_pelanggan') }}</span>
          @endif
        </div>
        <div class="form-group row col-6">
            <label for="nama_pelanggan" style="font-size: 15px">Nama Pelanggan</label>
            <input type="text" class="form-control {{ $errors->has('nama_pelanggan') ? ' is-invalid' : '' }}" id="nama_pelanggan" name="nama_pelanggan" placeholder="example : Murdiyono">
            @if($errors->has('nama_pelanggan'))
              <span class="invalid-feedback">{{ $errors->first('nama_pelanggan') }}</span>
            @endif
          </div>
          <div class="form-group row col-6">
            <label for="alamat" style="font-size: 15px">Alamat Pelangggan</label>
            <input type="text" class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" id="alamat" name="alamat" placeholder="example : Peturen">
            @if($errors->has('alamat'))
              <span class="invalid-feedback">{{ $errors->first('alamat') }}</span>
            @endif
          </div>
          <div class="form-group row col-6">
            <label for="telepon" style="font-size: 15px">Telepon</label>
            <input type="text" class="form-control {{ $errors->has('telepon') ? ' is-invalid' : '' }}" id="telepon" name="telepon" placeholder="example : 089">
            @if($errors->has('telepon'))
              <span class="invalid-feedback">{{ $errors->first('telepon') }}</span>
            @endif
          </div>
    
      
				</table>
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