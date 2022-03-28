<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{asset('assets/img/AdminLTELogo.png')}}"  style="margin-top: 15px;">
      </div>
      {{-- @IF(SESSION(ROLE) == 'ADMIN') --}}
      
      <br>
      <br>
      <br>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">LJ</a>
      </div>
      <ul class="sidebar-menu">
          
        <li class="menu-header">Admin keu</li>
          <li class="nav-item dropdown">
            <a href="{{route('dasboard.index')}}" class="#"><i class="fas fa-home"></i><span>Dashboard</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-users"></i><span>Pengguna</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{route('akun.index')}}" class="#"><i class="fas fa-solid fa-file-invoice-dollar"></i><span>Akun</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-desktop"></i> <span>Master</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('barang.index')}}">Barang</a></li>
              <li><a class="nav-link" href="{{route('pelanggan.index')}}">Pelanggan</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-solid fa-wallet"></i><span>Transaksi</span></a>
            {{-- <i class="fa-regular fa-money-from-bracket"></i> --}}
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('tunai.create')}}">Tunai</a></li>
              <li><a class="nav-link" href="{{route('kredit.create')}}">Kredit</a></li>
              <li><a class="nav-link" href="{{route('angsuranindex.index')}}">Bayar Angsuran</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i><span>Laporan</span></a>
            {{-- <i class="fa-regular fa-money-from-bracket"></i> --}}
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('lappen.index')}}">Laporan Penjualan</a></li>
              <li><a class="nav-link" href="{{route('lappi.index')}}">Laporan Piutang</a></li>
              <li><a class="nav-link" href="{{route('jurnalumum.index')}}">Jurnal Umum</a></li>
              <li><a class="nav-link" href="{{route('bukubesar.index')}}">Buku Besar</a></li>
              <li><a class="nav-link" href="{{route('neraca.index')}}">Neraca</a></li>
            </ul>
          </li>
          {{-- <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-home"></i><span>Laporan Penjualan</span></a>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="#"><i class="fas fa-home"></i><span>Laporan Piutang</span></a>
          </li> --}}
          
          <li class="menu-header">Pemilik</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="components-article.html">Laporan Penjualan</a></li>
              <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Laporan Piutang</a></li>
              <li><a class="nav-link" href="components-chat-box.html">Jurnal Umum</a></li>
              <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Buku Besar</a></li>
              <li><a class="nav-link" href="components-gallery.html">Neraca</a></li>
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