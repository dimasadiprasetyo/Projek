<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lancar Jaya | Log in </title>

  <link rel="shortcut icon" href="{{asset('assets/LJA.ico')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist/css/adminlte.min.css')}}">
  <style>
    body{
      margin: 0;
      padding: 0;
      background: url(Lj.jpeg);
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    .login-box{
      background: rgba(0, 0, 0, 0.5);
      border-radius: 50%;
    }
    #watch {
            color: rgb(252, 150, 65);
            position: absolute;
            z-index: 1;
            height: 40px;
            width: 700px;
            overflow: show;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            font-size: 10vw;
            -webkit-text-stroke: 3px rgb(210, 65, 36);
            text-shadow: 4px 4px 10px rgba(210, 65, 36, 0.4),
                4px 4px 20px rgba(210, 45, 26, 0.4),
                4px 4px 30px rgba(210, 25, 16, 0.4),
                4px 4px 40px rgba(210, 15, 06, 0.4);
    }

  </style>
</head>
<body class="hold-transition login-page" onload="realtimeClock()">
  <div class="form-group">
    <center>
        <label id="clock" style="font-size: 70px; color: #0A77DE; -webkit-text-stroke: 3px #edeff0;
                    text-shadow: 4px 4px 10px #3903fd42,
                    3px 3px 10px #36d6fe59,
                    3px 3px 20px#36d6fe60,
                    3px 3px 30px #36d6fe41;">
        </label>
    </center>
  </div>
  <div class="login-box" >
    <!-- /.login-logo -->
    <div class="card card-outline card-primary" style="background:hsla(0, 0%, 100%, 0.767)" class="login-box">
      <div class="card-header text-center">
        <a href="#" class="h1" style="color: rgba(116, 116, 255, 0.938)"><b>SISPEN LJ </b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in ke Halaman Login</p>
        @if (session('message'))
              <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>x</span>
                  </button>
                    {{session('message')}}
                </div>
              </div>
          @endif

        <form action="{{route('postlogin')}}" method="post">{{--form Action--}}
          {{csrf_field()}}
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="input-group mb-3">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span>
                  <i class="fa fa-eye"
                  aria-hidden="true" id="eye"
                  onclick="toggle()"></i>
                </span>
                {{-- <span class="fas fa-envelope"></span> --}}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              {{-- <div class="icheck-primary">
                <input type="checkbox" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }}
                </label>
              </div> --}}
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
        </div> --}}
        <!-- /.social-auth-links -->
        <p class="mb-0" style="text-align: center">
          <a href="register.html" class="text-center">Sispen-Lj V2.1.0</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/js/jam.js') }}"></script>
    <script src="{{asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('AdminLTE/assets/dist/js/adminlte.min.js')}}"></script>

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
</body>
</html>
