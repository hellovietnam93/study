<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Đăng nhập | StudyHub - Hệ thống Hỗ trợ Học tập, Giảng dạy - Trường Đại học Bách Khoa Hà Nội</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed-top navbar-dark bg-primary bg-faded">
        <a href="{{ route('home') }}}" class="navbar-brand">StudyHub</a>
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <a href="{{ route('auth::register') }}" class="btn btn-success">Tạo tài khoản</a>
            </li>
        </ul>
    </nav>
    <!-- End NAVBAR -->
    <!-- CONTENT -->
    <div class="wrapper" id="authPage">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="card auth-card">
                        <div class="card-block">
                            <h4 class="card-title">Đăng nhập</h4>
                            @if (count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <p><strong>Oops!!</strong> Đã có lỗi xảy ra khi đăng nhập</p>
                                <ul>
                                @foreach($errors as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            </div>
                            @endif
                            <!-- <h6 class="card-subtitle text-muted">Xin vui lòng điền thông tin đăng nhập</h6> -->
                        </div>
                        <div class="card-block">
                            <!-- Login form -->
                            <div class="form">
                                <form action="{{ route('auth::login') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <fieldset class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <label for="password">Mật khẩu</label>
                                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                                    </fieldset>
                                    <div class="checkbox">
                                        <label class="c-input c-checkbox">
                                            <input type="checkbox" name="remember">
                                            <span class="c-indicator"></span> Ghi nhớ đăng nhập
                                        </label>
                                    </div>
                                    <a href="{{ url('auth/password/email') }}" class="card-link">Quên mật khẩu</a>
                                    <button type="submit" class="btn btn-primary pull-right">Đăng nhập</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            <!-- End Login form -->
                        </div>
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
