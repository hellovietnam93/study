@extends('layouts.app')
@section('title', 'New Class')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::open(['method' => 'POST', 'route' => ['lecturer::class.store', $courseID]]) !!}
          @include('lecturer.studyclasses._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
