@extends('layouts.lecturer')
@section('title', trans('layout.title'))
@section('content')
  <div class="wrapper" id="authPage">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="class">
            <table class="table table-bordered table-hover">
              @include('lecturer.studyclasses._header')
              @foreach($classes as $class)
                @include('lecturer.studyclasses._class')
              @endforeach
            </table>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card auth-card">
            {!! Form::open() !!}
              <div class="form-group">
                {!! Form::file(null, null, ['class' => 'form-control input-lg']) !!}
              </div>
              <div class="form-group">
                {!! Form::submit(trans('layout.button.action.upload'), ['class' => 'btn btn-primary']) !!}
              </div>
            {!! Form::close() !!}
          </div>
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
