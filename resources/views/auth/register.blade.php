<!DOCTYPE html>
<html lang="vi">
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Tạo tài khoản mới | StudyHub - Hệ thống Hỗ trợ Học tập, Giảng dạy - Trường Đại học Bách Khoa Hà Nội</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-fixed-top navbar-dark bg-primary bg-faded">
        <a href="#" class="navbar-brand">StudyHub</a>
        <ul class="nav navbar-nav pull-right">
            <li class="nav-item">
                <a href="{{ route('auth::login') }}" class="btn btn-success">Đăng nhập</a>
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
                            <h4 class="card-title">Tạo tài khoản mới</h4>
                            <h6 class="card-subtitle text-muted">Xin vui lòng điền đầy đủ những thông tin dưới đây để tạo tài khoản mới</h6>
                        </div>
                        <div class="card-block">
                            <!-- Signup form -->
                            {!! Form::open() !!}
                                <div class="form-group">
                                    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control input-lg']) !!}
                                    {!! error_text($errors, 'name') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                                    {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'username@example.com']) !!}
                                    {!! error_text($errors, 'email') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                                    {!! Form::password('password', ['class' => 'form-control input-lg']) !!}
                                    {!! error_text($errors, 'password') !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'control-label']) !!}
                                    {!! Form::password('password_confirmation', ['class' => 'form-control input-lg']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('Tạo tài khoản', ['class' => 'btn btn-primary']) !!}
                                </div>
                            {!! Form::close() !!}
                            <!-- End Signup form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CONTENT -->
    <!-- jQuery first, then Bootstrap JS. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    <script>
    $('#roleSelect').change(function() {
        var value = $(this).val();
        if (value != 'student')
            $('#studentIdField').css('display', 'none');
        else
            $('#studentIdField').css('display', 'block');
    });
    </script>
</body>
</html>
