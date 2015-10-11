<nav class="navbar navbar-default navbar-fixed-top shnavbar">
  <div class="container-fluid">
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

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <form class="navbar-form navbar-left" role="search">
        <div class="search">
          <input type="text" class="text" tabindex="1" id="header-search" placeholder="Tìm kiếm..." autocomplete="off">
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if (auth()->guest())
          <li>
            <div class="header-button">
              <a href="{{ route('auth::register') }}" class="btn shbtn-success">
                {{ trans('user.action.new_account') }}
              </a>
            </div>
          </li>
          <li>
            <div class="header-button">
              <a href="{{ route('auth::login') }}" class="btn btn-primary">
                {{ trans('user.action.login') }}
              </a>
            </div>
          </li>
        @else
          <li class="dropdown">
            <a href="#" class="dropdown-image-toggle dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ $authUser->name }}
            </a>
            <ul class="dropdown-menu shdropdown-menu" role="menu">
              <li><a href="#">{{ trans('user.account') }}</a></li>
              <li><a href="#">{{ trans('user.result') }}</a></li>
              <li class="divider"></li>
              <li><a href="#">{{ trans('user.help') }}</a></li>
              <li><a href="#">{{ trans('user.language') }} Tiếng Việt</a></li>
              <li><a href="#">{{ trans('user.comment') }}</a></li>
              <li class="divider"></li>
              <li><a href="{{ route('auth::logout') }}">{{ trans('user.action.logout') }}</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
