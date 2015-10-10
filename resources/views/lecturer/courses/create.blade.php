@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center">{{ trans('course.action.new_course') }}</h1>
      <div class="form-wrapper">
        {!! Form::open(['method' => 'POST', 'route' => ['lecturer::course.store']]) !!}
          @include('lecturer.courses._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
