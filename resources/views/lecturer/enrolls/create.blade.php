@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::open(['method' => 'POST', 'route' => ['lecturer::enroll.store', $course->id, $class->id]]) !!}
          @include('lecturer.enrolls._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
@section('footer')
  <div class="pagelet-footer">
    <span class="system-info">{{ trans('layout.footer.name') }}</span>
  </div>
@stop
