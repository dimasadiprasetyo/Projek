@extends('layout.template')
@section('title')
    Tambah Pengguna /
@endsection

@section('judul')
  <h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fa fa-user" style='font-size:25px;'></i>&nbsp;DATA PENGGUNA </font>
  </h1>
@endsection

@section('content')
  <div class="card card-primary">

      <form action="{{route('pengguna.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body" style="background-color:#c9c7c5">
          <h5>TAMBAH DATA</h5>
          <br>
          <br>
          <div class="form-group row col-6">
            <label for="name" style="font-size: 15px" style="color: black">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="example : Ivanda" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group row col-6">
              <label for="level" style="font-size: 15px" style="color: black">Level</label>
              <select class="form-control" id="level" name="level" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')">
                <option value ="" disabled selected>-- Pilih Jenis Level --</option>
                <option >admin</option>
                <option >pemilik</option>
              </select>
          </div>
          <div class="form-group row col-6">
              <label for="email" style="font-size: 15px" style="color: black">E-Mail</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="example : Mulyadi@google.com" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group row col-6">
            <label for="username" style="font-size: 15px" style="color: black">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="example : Mulyadi" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
        </div>
          <div class="form-group row col-6">
            
              <label for="password" style="font-size: 15px" style="color: black">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="example : 12345" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
              
          </div>
          {{-- <div class="form-group row col-6">
              <label for="email_verified_at" style="font-size: 15px" style="color: black">E-Mail Verified</label>
              <input type="text" class="form-control" id="email_verified_at" name="email_verified_at" placeholder="example : Mulyadi@google.com">
          </div> --}}
          <div class="card-footer">
            <button onclick="withToastSuccess()" type="submit" class="btn btn-primary">
              <i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan
            </button>
            <a href="{{route('pengguna.index')}}" class="btn btn-danger">Kembali</a>
          </div>
        
        </div>
      </form>
  </div>
@endsection
@section('akhir')
  <script>
    var state = false;
    function toggle(){
      if (state) {
          document.getElementById("password").setAttribute("type","password");
          state = false;
      }else{
          document.getElementById("password").setAttribute("type","text");
          state = true;
      }
    }

  </script>
@endsection