@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="class">
            <table class="table table-bordered table-hover">
              @include('admin.studyclasses._header')
              @include('admin.studyclasses._class')
            </table>
          </div>
        </div>
        <div class="col-md-3">
          @if ($class->user_id == null)
            {{ trans('studyclass.no_teacher') }}
          @else
            {{ trans('studyclass.teacher') }}
            {{ $class->user->name }}
          @endif
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
