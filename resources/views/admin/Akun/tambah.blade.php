@extends('layout.template')
@section('title')
    Tambah Akun /
@endsection
@section('judul')
   <h4>FORM AKUN</h4>
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('akun.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <h5>TAMBAH DATA</h5>
        <br>
        <br>
        <div class="form-group row col-6">
          <label for="id_akun">ID Akun</label>
          <input type="text" class="form-control" id="id_akun" name="id_akun" placeholder="example : P001">
        </div>
        <div class="form-group row col-6">
            <label for="nama_akun">Nama Akun</label>
            <input type="text" class="form-control" id="nama_akun" name="nama_akun" placeholder="example : Mulyadi">
          </div>
          <div class="form-group row col-6">
            <label for="jenis_akun">Jenis Akun</label>
            <select class="form-control" name="jenis_akun">
              <option>-- Pilih Jenis Akun --</option>
              <option value="Debet">DEBET</option>
              <option value="Kredit">KREDIT</option>
      </select>
          </div>
    
      
				</table>
			
		</div>
      <div class="card-footer">
        <button onclick="withToastSuccess()" type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('akun.index')}}" class="btn btn-danger">Kembali</a>
      </div>
    </form>
  </div>
@endsection