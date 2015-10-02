@extends('layouts.lecturer')
@section('title', 'Tất cả môn học | StudyHub - Hệ thống Hỗ trợ Học tập, Giảng dạy -
  Trường Đại học Bách Khoa Hà Nội')
@section('content')
  @if (auth()->guest())
    sida
  @else
    <div class="container-fluid">
      <div class="row">
        <div class="pagelet-header">
          <div class="pagelet-title-wrapper pagelet-header-component">
            <h3 class="pagelet-title">Các lớp học trong kỳ 20151</h3>
          </div>
          <!-- <div class="header-btn"><button class="btn btn-success" id="createCourse">Tạo lớp học mới</button></div> -->
          <div class="pagelet-header-menu-wrapper pagelet-header-component">
            <button class="btn shbtn-default shbtn-slim popoverable" id="addTeachingClass" type="button" data-popover="#initializeCreateNewClass">Thêm lớp giảng dạy</button>

            <button class="btn shbtn-default shbtn-slim" id="createNewCreate"
              type="button" data-popover="#initializeCreateNewClass">
              <a href="{{ route('lecturer::course.create') }}">Tạo lớp học mới</a>
            </button>
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
          <!-- Class list -->
          <div class="row grid-view">
            <div class="row-eq-height">
              @foreach($courses as $course)
                @include('lecturer.courses._course')
              @endforeach
            </div>
          </div>
          <!-- End Class list -->
        </div> <!-- ./pagelet-content -->
      </div>
      <div class="wrapper" id="authPage">
        <div class="container">
          <div class="row">

            <div class="col-md-3">
              <div class="card auth-card">
                @include('lecturer.courses._uploads')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif
@stop
@section('footer')
  <div class="pagelet-footer">
    <span class="system-info">StudyHub - Hệ thống hỗ trợ Học tập - Giảng dạy Trường Đại học Bách Khoa Hà Nội</span>
  </div>
@stop
