@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h1 class="text-center">{{ trans('semester.action.new_semester') }}</h1>
      <div class="form-wrapper">
        {!! Form::open(['method' => 'POST', 'route' => ['admin::semester.store']]) !!}
          @include('admin.semesters._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
