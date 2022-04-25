
<div class="main-wrapper" >
  <div class="navbar-bg" style="background: #010a86!important;"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
      <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
          <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
        <br>
        <br>
        <span style="color: white; font-size: 20px">SISTEM PENJUALAN LANCAR JAYA</span>

      </form>
      <ul class="navbar-nav navbar-right">
       
        
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
          <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
          <div class="d-sm-none d-lg-inline-block">Hi, {{auth()->user()->name}}</div></a>
          <div class="dropdown-menu dropdown-menu-right">
            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
            <a href="#" class="dropdown-item has-icon">
              <i class="fas fa-bolt"></i>Ubah Sandi
            </a>
            <a href="{{route('logout')}}" class="dropdown-item has-icon text-danger">
              <i class="fas fa-sign-out-alt"></i> Logout
              <div class="dropdown-divider"></div>
            </a>
          </div>
        </li>
      </ul>
    </nav>
</div>
