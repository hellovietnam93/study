@extends('layouts.app')
@section('title', $class->id)
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::model($class, ['method' => 'PATCH', 'route' => ['lecturer::class.update', $course, $class]]) !!}
          @include('lecturer.studyclasses._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
