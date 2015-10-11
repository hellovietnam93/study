<div class="col-md-3">
  <a href="" class="class-link card-link">
    <div class="card class-card">
      <div class="overlay">
        <span class="overlay-msg">{{ trans('course.action.enroll_class') }}</span>
      </div>
      <div class="img-wrapper">
        {!! Html::image('img/course-img-red.png', 'StudyHub', array('style' => "width:100%;")) !!}
      </div>
      <div class="course-code">
        <span>{{$course->id}}</span>
      </div>
      <div class="course-title">
        <h4>{{$course->name}}</h4>
      </div>
      <a href="{{ route('admin::course.edit', $course->id) }}">
        {{ trans('layout.button.action.edit') }}
      </a>
      @include('admin.courses._delete')
      <div class="course-info">
        <div class="row">
          <div class="col-xs-6">
            <p>{{ trans('studyclass.header.id') }}<span class="class-code card-value">84346</span></p>
          </div>
          <div class="col-xs-6">
            <p><span class="course-credit card-value">2</span> {{ trans('studyclass.header.tinchi') }}</p>
          </div>
          <div class="col-xs-6">
            <p>{{ trans('studyclass.header.semester') }}<span class="class-semester card-value">20151</span></p>
          </div>
          <div class="col-xs-6">
            <p>{{ trans('studyclass.header.week') }}<span class="current-week card-value">3</span></p>
          </div>
        </div>
      </div>
    </div>
  </a>
</div>
