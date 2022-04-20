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
          
        {{-- Judul/Admin --}}
        <li class="menu-header" style="color: black">Admin keu
        </li>
        {{-- Dasboard/Admin --}}
        <li class="nav-item dropdown">
            <a href="{{route('dasboard.index')}}" class="#">
              <i class="fas fa-home" style="color: black" ></i><span style="color: black">Dashboard</span>
            </a>
        </li>
        {{-- Pengguna/Admin --}}
        <li class="nav-item dropdown" >
          <a href="#" class="#">
            <i class="fas fa-users" style="color: black"></i><span style="color: black">Pengguna</span>
          </a>
        </li>
        {{-- Akun/Admin --}}
        <li class="nav-item dropdown">
          <a href="{{route('akun.index')}}" class="#">
            <i class="fas fa-solid fa-file-invoice-dollar" style="color: black"></i><span style="color: black">Akun</span>
          </a>
        </li>
        {{-- Master/Admin --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-desktop" style="color: black"></i> <span style="color: black">Master</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('barang.index')}}" style="color: black">Barang</a></li>
            <li><a class="nav-link" href="{{route('pelanggan.index')}}" style="color: black">Pelanggan</a></li>
          </ul>
        </li>
        {{-- Transaksi/Admin --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-solid fa-wallet" style="color: black"></i><span style="color: black">Transaksi</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('tunai.create')}}" style="color: black">Tunai</a></li>
            <li><a class="nav-link" href="{{route('kredit.create')}}" style="color: black">Kredit</a></li>
            <li><a class="nav-link" href="{{route('angsuranindex.index')}}" style="color: black">Bayar Angsuran</a></li>
          </ul>
        </li>
        {{-- Laporan/Admin --}}
        <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-file-alt" style="color: black"></i><span style="color: black">Laporan</span>
          </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('lappen.index')}}" style="color: black">Laporan Penjualan</a></li>
            <li><a class="nav-link" href="{{route('lappi.index')}}" style="color: black">Laporan Piutang</a></li>
            <li><a class="nav-link" href="{{route('jurnalumum.index')}}" style="color: black">Jurnal Umum</a></li>
            <li><a class="nav-link" href="{{route('bukubesar.index')}}" style="color: black">Buku Besar</a></li>
            <li><a class="nav-link" href="{{route('neraca.index')}}" style="color: black">Neraca</a></li>
          </ul>
        </li>
        {{-- Pemilik --}}
        <li class="menu-header" style="color: black">Pemilik</li>
          <li class="nav-item dropdown">
          <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-file-alt" style="color: black"></i><span style="color: black">Laporan</span>
          </a>
          {{-- Pemilik --}}
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{route('lappen.indexpemilik')}}" style="color: black">Laporan Penjualan</a></li>
            <li><a class="nav-link" href="{{route('lappipemilik.index')}}" style="color: black">Laporan Piutang</a></li>
            <li><a class="nav-link" href="{{route('jurnalumum.index')}}" style="color: black">Jurnal Umum</a></li>
            <li><a class="nav-link" href="{{route('bukubesarpemilik.index')}}" style="color: black">Buku Besar</a></li>
            <li><a class="nav-link" href="{{route('neracapemilik.index')}}" style="color: black">Neraca</a></li>
          </ul>
        </li>
    </ul>
  </aside>
</div>