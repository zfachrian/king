<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Shoesmart | {{ $title }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('back/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('back/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a><b>Log</b>in</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
            <p class="login-box-msg"> Sign in to start your session </p>
        
            <form action="{{ route('auth.loginAuth') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Username" id="username" name="username">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-secondary btn-block pull-right">Sign In</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('back/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
