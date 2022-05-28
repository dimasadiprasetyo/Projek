@extends('layout.template')
@section('title')
    Tambah Akun /
@endsection

@section('judul')
  <h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fa fa-bitcoin" style='font-size:25px;'></i>&nbsp;DATA AKUN </font>
  </h1>
@endsection

@section('content')
  <div class="card card-primary">

      <form action="{{route('akun.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body" style="background-color:#c9c7c5">
          <h5>TAMBAH DATA</h5>
          <br>
          <br>
          <div class="form-group row col-6">
            <label for="id_akun" style="font-size: 15px" style="color: black">ID Akun</label>
            <input type="text" class="form-control" id="id_akun" name="id_akun" placeholder="example : 101" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>

          <div class="form-group row col-6">
              <label for="nama_akun" style="font-size: 15px" style="color: black">Nama Akun</label>
              <input type="text" class="form-control"  id="nama_akun" name="nama_akun" placeholder="example : Kas" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>

          <div class="form-group row col-6">
              <label for="jenis_akun" style="font-size: 15px" style="color: black">Jenis Akun</label>
              <select class="form-control" name="jenis_akun" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')">
                <option value="" selected disabled>-- Pilih Jenis Akun --</option>
                <option value="Debet">DEBET</option>
                <option value="Kredit">KREDIT</option>
              </select>
          </div>

          <div class="card-footer">
            <button onclick="withToastSuccess()" type="submit" class="btn btn-primary">
              <i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan
            </button>
            <a href="{{route('akun.index')}}" class="btn btn-danger">Kembali</a>
          </div>
        
        </div>
      </form>
  </div>
@endsection