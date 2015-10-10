@extends('layouts.lecturer')
@section('title', 'Tất cả môn học | StudyHub - Hệ thống Hỗ trợ Học tập, Giảng dạy -
  Trường Đại học Bách Khoa Hà Nội')
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
    <span class="system-info">StudyHub - Hệ thống hỗ trợ Học tập - Giảng dạy Trường Đại học Bách Khoa Hà Nội</span>
  </div>
@stop
