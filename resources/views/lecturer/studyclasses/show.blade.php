<!DOCTYPE html>
<html lang="vi">
<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>{{ $class->id }} | StudyHub - Hệ thống Hỗ trợ Học tập, Giảng dạy -
      Trường Đại học Bách Khoa Hà Nội</title>

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/common.css') }}">
  <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-fixed-top navbar-dark bg-primary bg-faded">
    <a href="{{ route('home') }}}" class="navbar-brand">StudyHub</a>
    <ul class="nav navbar-nav navbar-right pull-right">
      @if (auth()->guest())
        <li><a href="{{ route('auth::login') }}">Log In</a></li>
        <li><a href="{{ route('auth::register') }}">Sign Up</a></li>
      @else
        <li>
            {{ $authUser->name }}
        </li>
        <li>
            <a href="{{ route('auth::logout') }}" class="navbar-brand">Log out</a>
        </li>
      @endif
    </ul>
  </nav>
  <!-- End NAVBAR -->
  <!-- CONTENT -->
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="class">
            <table class="table table-bordered table-hover">
              @include('lecturer.studyclasses._header')
              @include('lecturer.studyclasses._class')
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End CONTENT -->
  <!-- jQuery first, then Bootstrap JS. -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
