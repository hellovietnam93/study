<!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudyHub | Đăng nhập</title>

    <!-- Bootstrap -->
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="single-page">
      <div class="container">
        <!-- Logo -->
        <div class="row">
          <div class="sgpage-header">
            <div class="page-header" id="logo">
              <div class="header-image">
                {!! Html::image('img/logo-inversed.png', 'StudyHub') !!}
              </div>
              <div class="header-button">
                <a href="{{ route('auth::register') }}" class="btn shbtn-success pull-right">Tạo tài khoản mới</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Login form -->
        <div class="row">
          <div class="col-md-4 col-md-offset-4 ">
            <div class="auth-form" id="login">
              <form action="" method="post" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="">
                <div class="auth-form-header">
                  <h1>Đăng nhập</h1>
                </div>
                <div class="auth-form-body">
                  <div class="form-group">
                    @if (count($errors) > 0)
                      <div class="alert alert-danger" role="alert" id="login-error">
                        <p><strong>Oops!!</strong> Đã có lỗi xảy ra khi đăng nhập</p>
                        <ul>
                          @foreach($errors as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                  </div>
                  <div class="form">
                    <form action="{{ route('auth::login') }}" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div class="form-group">
                        <input type="text" class="form-control" name="email" autocapitalize="off" autocorrect="off" placeholder="Email">
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" autocapitalize="off" autocorrect="off" placeholder="Mật khẩu">
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <div class="auth-remember">
                            <input type="checkbox" name="remember"> <span>Ghi nhớ đăng nhập</span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <button type="submit" name="submit" class="btn btn-primary pull-right">Đăng nhập</button>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <div class="auth-forgot-password">
                          <p>
                            <a href="{{ url('auth/password/email') }}">Quên mật khẩu</a>
                          </p>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{ elixir('js/all.js') }}"></script>
  </body>
 </html>
