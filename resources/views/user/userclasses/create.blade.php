@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::open(['method' => 'POST', 'route' => ['member::enroll.store', $courseID, $classID]]) !!}
          @include('user.userclasses._form')
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
