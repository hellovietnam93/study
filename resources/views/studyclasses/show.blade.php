@extends('layouts.lecturer')
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="class">
            <table class="table table-bordered table-hover">
              @include('studyclasses._header')
              @include('studyclasses._class')
            </table>
          </div>

          <div class="student">
            @if (!auth()->user()->checkUserInClass($class->id) && !auth()->user()->isLecturer())
              <div class="col-md-3">
                <a href="{{ route('enroll', array($course->id, $class->id)) }}">
                  {{ trans('studyclass.action.student_enroll') }}
                </a>
              </div>
            @endif
            <div class="col-md-12">
              @foreach($users as $user)
                @include('studyclasses._user')
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-md-3">
          @if ($class->user_id == null)
            <a href="{{ route('enroll', array($course->id, $class->id)) }}">
              {{ trans('studyclass.action.lecturer_enroll') }}
            </a>
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
