@extends('layouts.lecturer')
@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="form-wrapper">
        {!! Form::model($semester, ['method' => 'PATCH', 'route' => ['admin::semester.update', $semester]]) !!}
          @include('admin.semesters._form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@stop
