<!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>StudyHub | Hệ thống Hỗ trợ Học tập, Giảng dạy Trường Đại học Bách Khoa Hà Nội | Online Learning and Teaching Support System at Hanoi University of Science and Technology</title>

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
      @include('lecturer.layouts.nav')
      <div class="body-wrapper">
        <div class="page-left">
          @include('flash::message')
          @yield('content')
        </div>

        <div class="page-right">
          <div class="sidebar">
            <!-- acitivity -->
            <div class="activity-list sidebar-component">
              <div class="component-header">
                <span>Thông báo</span>
              </div>
              <div class="component-body">
                <div class="activities scrollable" id="activities">
                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>

                  <div class="activity">
                    <div class="creator">
                      <img src="img/static/avatar.jpg" alt="" class="member-avatar">
                    </div>
                    <div class="activity-desc">
                      <div class="activity-content">
                        <span class="inline-member">Đào Đức Cương</span> đã tải lên một tài liệu trong lớp <span class="target">84346 - Cơ sở dữ liệu</span>
                      </div>
                      <div class="activity-meta">
                        <span class="date">1 giờ trước</span>
                      </div>
                    </div>
                  </div>
                </div> <!-- ./activities -->
              </div> <!-- ./component-body -->
            </div> <!-- ./activity -->
            <!-- mini-calendar -->
            <div class="mini-calendar sidebar-component">
              <div class="component-header">
                <span>Lịch làm việc</span>
                <span class="pull-right collapse-component" id="collapseCalendar"><i class="glyphicon glyphicon-chevron-down"></i></span>
              </div>
              <div class="component-body">
              <div id="miniCalendar"></div>
              </div> <!-- ./component-body-->
            </div> <!-- ./mini-calendar -->
          </div>
        </div>
      </div>

      @yield('footer')
  </body>
</html>
