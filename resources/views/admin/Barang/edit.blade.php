@extends('layout.template')
@section('title')
    Edit Barang /
@endsection
@section('judul')
   <h4>FORM BARANG</h4>
@endsection
@section('content')
<div class="card card-primary">
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('barang.update',$barang->kode_barang)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
      <div class="card-body">
        <h5>TAMBAH DATA</h5>
        <br>
        <br>
        <div class="form-group row col-6">
          <label for="kode_barang">Kode Kayu</label>
          <input type="text" class="form-control" value="{{$barang->kode_barang}}" id="kode_barang" name="kode_barang" placeholder="example : BrgKG01">
        </div>
        <div class="form-group row col-6">
            <label for="jenis_barang">Jenis Kayu</label>
            <input type="text" class="form-control" value="{{$barang->jenis_barang}}" id="jenis_barang" name="jenis_barang" placeholder="example : Kayu Glugu">
          </div>
          <div class="form-group row col-6">
            <label for="exampleFormControlSelect1">Asal Kayu</label>
            <select class="form-control" name="asal_barang" id="asal_barang">
              <option >Pilih Jenis Kayu</option>
              <option value="Lokal"{{$barang->asal_barang == "Lokal" ? 'selected' : '' }}>Lokal</option>
              <option value="Luar"{{$barang->asal_barang == "Luar" ? 'selected' : '' }}>Luar</option>
            </select>
        </div>
          <div class="form-group row col-6">
            <label for="ukuran_barang">Ukuran Meter</label>
            <input type="text" class="form-control" value="{{$barang->ukuran_barang}}" id="ukuran_barang" name="ukuran_barang" placeholder="example : 12m">
          </div>
          <div class="form-group row col-6">
            <label for="stok">Stok</label>
            <input type="text" class="form-control" value="{{$barang->stok}}" id="stok" name="stok" placeholder="example : 1">
          </div>
          <div class="form-group row col-6">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" value="{{$barang->harga}}" id="harga" name="harga" placeholder="example :12000">
          </div>
    
      
				</table>
			
		</div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary" onclick="withToastSuccess()">Simpan</button>
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