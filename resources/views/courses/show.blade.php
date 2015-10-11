@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="course">
            <h1>{{ trans('course.class_name') }}</h1>
            <table class="table table-bordered table-hover">
              @include('courses._header')
              @include('courses._course')
            </table>
          </div>
          <div class="classes">
            <h1>{{ trans('studyclass.classes') }}</h1>
            @if (auth()->user()->isLecturer())
              <p>
                <a href="{{ route('class.create', $course->id) }}">
                  {{ trans('course.action.new_class') }}
                </a>
              </p>
            @endif
            <table class="table table-bordered table-hover">
              @include('studyclasses._header')
              @foreach($classes as $class)
                @include('studyclasses._class')
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@stop
@section('footer')
  <div class="pagelet-footer">
    <span class="system-info">{{ trans('layout.footer.name') }}</span>
  </div>
@stop
