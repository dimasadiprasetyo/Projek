<div class="main-sidebar" style="color: black">
  <aside id="sidebar-wrapper" style="color: black">
    <div class="sidebar-brand">
        <img src="{{asset('assets/img/AdminLTELogo.png')}}"  style="margin-top: 15px;">
      </div>
      {{-- @IF(SESSION(ROLE) == 'ADMIN') --}}
      
      <br>
      <br>
      <br>
      <div class="sidebar-brand sidebar-brand-sm" style="color: black">
        <a href="index.html">LJ</a>
      </div>
      <ul class="sidebar-menu" style="color: black">
          
        <li class="menu-header" style="color: black">Admin keu</li>
          <li class="nav-item dropdown">
            <a href="{{route('dasboard.index')}}" class="#">
              <i class="fas fa-home" style="color: black" ></i><span style="color: black">Dashboard</span></a>
          </li>
          <li class="nav-item dropdown" >
            <a href="#" class="#">
              <i class="fas fa-users" style="color: black"></i><span style="color: black">Pengguna</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{route('akun.index')}}" class="#">
              <i class="fas fa-solid fa-file-invoice-dollar" style="color: black"></i><span style="color: black">Akun</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
              <i class="fas fa-desktop" style="color: black"></i> <span style="color: black">Master</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('barang.index')}}" style="color: black">Barang</a></li>
              <li><a class="nav-link" href="{{route('pelanggan.index')}}" style="color: black">Pelanggan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-solid fa-wallet" style="color: black"></i><span style="color: black">Transaksi</span></a>
            {{-- <i class="fa-regular fa-money-from-bracket"></i> --}}
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('tunai.create')}}" style="color: black">Tunai</a></li>
              <li><a class="nav-link" href="{{route('kredit.create')}}" style="color: black">Kredit</a></li>
              <li><a class="nav-link" href="{{route('angsuranindex.index')}}" style="color: black">Bayar Angsuran</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-file-alt" style="color: black"></i><span style="color: black">Laporan</span></a>
            {{-- <i class="fa-regular fa-money-from-bracket"></i> --}}
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('lappen.index')}}" style="color: black">Laporan Penjualan</a></li>
              <li><a class="nav-link" href="{{route('lappi.index')}}" style="color: black">Laporan Piutang</a></li>
              <li><a class="nav-link" href="{{route('jurnalumum.index')}}" style="color: black">Jurnal Umum</a></li>
              <li><a class="nav-link" href="{{route('bukubesar.index')}}" style="color: black">Buku Besar</a></li>
              <li><a class="nav-link" href="{{route('neraca.index')}}" style="color: black">Neraca</a></li>
            </ul>
          </li>
          {{-- <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-home"></i><span>Laporan Penjualan</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-home"></i><span>Laporan Piutang</span></a>
          </li> --}}
          
          <li class="menu-header" style="color: black">Pemilik</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown">
              <i class="fas fa-file-alt" style="color: black"></i><span style="color: black">Laporan</span></a>
            {{-- <i class="fa-regular fa-money-from-bracket"></i> --}}
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('lappen.indexpemilik')}}" style="color: black">Laporan Penjualan</a></li>
              <li><a class="nav-link" href="{{route('lappi.index')}}" style="color: black">Laporan Piutang</a></li>
              <li><a class="nav-link" href="{{route('jurnalumum.index')}}" style="color: black">Jurnal Umum</a></li>
              <li><a class="nav-link" href="{{route('bukubesar.index')}}" style="color: black">Buku Besar</a></li>
              <li><a class="nav-link" href="{{route('neraca.index')}}" style="color: black">Neraca</a></li>
            </ul>
          </li>
          {{-- <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-sign-out-alt"></i><span>LogOut</span></a>
          </li> --}}



        {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
          <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Documentation
          </a>
        </div> --}}
    </aside>
  </div>