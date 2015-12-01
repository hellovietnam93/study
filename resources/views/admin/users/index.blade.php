@extends('layouts.lecturer')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="pagelet-header">
        <div class="pagelet-header-control-wrapper pagelet-header-component">
          <div class="pagelet-controls">
            <div class="pagelet-control"><i class="glyphicon glyphicon-th-list"></i></div>
            <div class="pagelet-control active"><i class="glyphicon glyphicon-th"></i></div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
      </div>
    </div>
    <div class="wrapper" id="authPage">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="card auth-card">
              @include('admin.users._uploads')
            </div>
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
