@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="classes">
            <h1>{{ trans('studyclass.classes') }}</h1>
            <table class="table table-bordered table-hover">
              @include('user.studyclasses._header')
              @foreach($classes as $class)
                @include('user.studyclasses._class')
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
