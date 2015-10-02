@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::model($course, ['method' => 'PATCH', 'route' => ['lecturer::course.update', $course]]) !!}
          @include('lecturer.courses._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
