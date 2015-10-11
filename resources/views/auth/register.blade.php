<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudyHub | Đăng ký tài khoản mới</title>

    <!-- Bootstrap -->
    <link href="{{ elixir('css/all.css') }}" rel="stylesheet">
    <script src="{{ elixir('js/all.js') }}"></script>
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
                <a href="{{ route('auth::login') }}" class="btn btn-primary pull-right">Đăng nhập</a>
              </div>
            </div>
          </div>
        </div>
        <!-- Login form -->
        <div class="row">
          <div class="col-md-5 col-md-offset-2 ">
            <div class="auth-form" id="signup">
              <form action="" method="post" accept-charset="UTF-8">
                <input type="hidden" name="_token" value="">
                <div class="auth-form-header">
                  <h1>Tạo tài khoản mới</h1>
                  <span>Vui lòng điền đầy đủ thông tin để tạo tài khoản mới tại StudyHub</span>
                </div>
                <div class="auth-form-body">
                  {!! Form::open() !!}
                    <div class="form-group">
                      {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
                      {!! Form::text('name', null, ['class' => 'form-control input-lg']) !!}
                      {!! error_text($errors, 'name') !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
                      {!! Form::email('email', null, ['class' => 'form-control input-lg', 'placeholder' => 'VD: example@domain.com']) !!}
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
                      <div class="form-submit">
                        {!! Form::submit('Tạo tài khoản mới', ['class' => 'btn btn-success pull-right']) !!}
                      </div>
                    </div>
                  {!! Form::close() !!}
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Footer -->
        <div class="row">
          <div class="footer">
            <a href="">Liên hệ</a>
          </div>
        </div>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
  </body>
</html>
