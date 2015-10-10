@extends('layouts.lecturer')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="pagelet-header">
        <div class="pagelet-title-wrapper pagelet-header-component">
          <h3 class="pagelet-title">Các lớp học trong kỳ 20151</h3>
        </div>
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
      <div class="pagelet-content">
        <div class="row grid-view">
          <div class="row-eq-height">
            @foreach($courses as $course)
              @include('user.courses._course')
            @endforeach
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
