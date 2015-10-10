@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="class">
            <table class="table table-bordered table-hover">
              @include('user.studyclasses._header')
              @include('user.studyclasses._class')
            </table>
          </div>
        </div>
        <div class="col-md-3">
          @if(Auth::user()->checkUserInClass($class->id, Auth::user()->id) == true)
            <a href="{{ route('member::enroll', array($course->id, $class->id)) }}">
              {{ trans('studyclass.action.enroll') }}
            </a>
          @endif
        </div>
        <div class="col-md-12">
          @foreach($users as $user)
            @include('user.users._user')
          @endforeach
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
