@extends('layout.template')
@section('title')
    Tambah Akun /
@endsection

@section('judul')
  <h1 style="color:black">
    <font size="5" face="Century Gothic"><i class="fa fa-bitcoin" style='font-size:25px;'></i>&nbsp;EDIT AKUN </font>
  </h1>
@endsection

@section('content')
  <div class="card card-primary">
      <form action="{{route('akun.update',$akun->id_akun)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
        <div class="card-body" style="background-color:#e0dfde">
          <div class="form-group row col-6">
            <label for="id_akun" style="color: black" style="font-size: 15px">ID Akun</label>
            <input style="color: black" type="text" value="{{$akun->id_akun}}" class="form-control" id="id_akun" name="id_akun" placeholder="example : P001">
          </div>
          <div class="form-group row col-6">
              <label for="nama_akun" style="color: black" style="font-size: 15px">Nama Akun</label>
              <input style="color: black" type="text" value="{{$akun->nama_akun}}" class="form-control" id="nama_akun" name="nama_akun" placeholder="example : Mulyadi">
          </div>
          <div class="form-group row col-6">
              <label for="jenis_akun" style="color: black" style="font-size: 15px">Jenis Akun</label>
              <select   class="form-control" name="jenis_akun" data-value="{{ $akun ? $akun->value : old('jenis_akun') }}">
                <option>-- Pilih Jenis Akun --</option>
                <option style="color: black" value="Debet" {{$akun->jenis_akun == 'Debet' ? 'selected' : null}}>DEBET</option>
                <option style="color: black" value="Kredit" {{$akun->jenis_akun == 'Kredit' ? 'selected' : null}}>KREDIT</option>
              </select>
          </div>
          
          <div class="card-footer">
            <button onclick="withToastSuccess() type="submit" class="btn btn-primary" >
              <i class="fa fa-floppy-o"  style="font-size:17px" aria-hidden="true"></i> Simpan
            </button>
            <a href="{{route('akun.index')}}" class="btn btn-danger">Kembali</a>
          </div>
        
        </div>
      </form>
  </div>
@endsection

@push('Awal')    
@endpush

@push('Akhir')
  <script>
      $(function() {
          $("select").each(function (index, element) {
                  const val = $(this).data('value');
                  if(val !== '') {
                      $(this).val(val);
                  }
          });
    })
  </script>
@endpush