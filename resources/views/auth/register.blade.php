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
                            <form class="form" action="{{ route('auth::register') }}" method="post">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <!-- <fieldset class="form-group">
                                    <label for="role">Bạn là</label>
                                    <select name="role" id="roleSelect" class="form-control">
                                        <option value="student">Sinh viên Đại học Bách Khoa Hà Nội</option>
                                        <option value="lecturer">Giảng viên Đại học Bách Khoa Hà Nội</option>
                                        <option value="staff">Cán bộ Đại học Bách Khoa Hà Nội</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group" id="studentIdField">
                                    <label for="hustid">Mã số sinh viên</label>
                                    <input type="text" class="form-control" name="hustid" placeholder="Mã số sinh viên">
                                </fieldset> -->
                                <fieldset class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Nhập lại mật khẩu">
                                </fieldset>
                                <div class="checkbox">
                                    <label class="c-input c-checkbox">
                                        <input type="checkbox" name="term_agree">
                                        <span class="c-indicator"></span> Tôi đã đọc, hiểu và đồng ý với những <a href="#" class="card-link">Điều khoản sử dụng</a> của StudyHub
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Tạo tài khoản</button>
                                <div class="clearfix"></div>
                            </form>
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
    <script src="js/bootstrap.min.js"></script>
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