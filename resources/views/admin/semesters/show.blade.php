@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="course">
            <h1>{{ trans('semester.class_name') }}</h1>
            <table class="table table-bordered table-hover">
              @include('admin.semesters._header')
              @include('admin.semesters._semester')
            </table>
          </div>
          <div class="classes">
            <h1>{{ trans('studyclass.classes') }}</h1>
            <table class="table table-bordered table-hover">
              @include('admin.studyclasses._header')
              @foreach($classes as $class)
                @include('admin.studyclasses._class')
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
