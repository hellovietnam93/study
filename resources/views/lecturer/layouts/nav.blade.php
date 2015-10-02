<nav class="navbar navbar-default navbar-fixed-top shnavbar">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        {!! Html::image('img/navbar-logo.png', 'StudyHub') !!}
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <form class="navbar-form navbar-left" role="search">
        <div class="search">
          <input type="text" class="text" tabindex="1" id="header-search" placeholder="Tìm kiếm..." autocomplete="off">
          <!-- <input type="submit" class="submit" value="q" tabindex="2"> -->
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if (auth()->guest())
          <li>
            <div class="header-button">
              <a href="{{ route('auth::register') }}" class="btn shbtn-success">Tạo tài khoản mới</a>
            </div>
          </li>
          <li>
            <div class="header-button">
              <a href="{{ route('auth::login') }}" class="btn btn-primary">Đăng nhập</a>
            </div>
          </li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-image-toggle dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ $authUser->name }}
            </a>
            <ul class="dropdown-menu shdropdown-menu" role="menu">
              <li><a href="#">Tài khoản</a></li>
              <li><a href="#">Kết quả học tập</a></li>
              <li class="divider"></li>
              <li><a href="#">Hướng dẫn</a></li>
              <li><a href="#">Ngôn ngữ: Tiếng Việt</a></li>
              <li><a href="#">Góp ý - Báo lỗi</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('auth::logout') }}">Thoát</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
