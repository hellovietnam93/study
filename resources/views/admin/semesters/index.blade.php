@extends('layouts.lecturer')
@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="pagelet-header">
        <div class="pagelet-header-menu-wrapper pagelet-header-component">
          <button class="btn shbtn-default shbtn-slim popoverable" id="addTeachingClass" type="button" data-popover="#initializeCreateNewClass">
            <a href="{{ route('admin::semester.create') }}">
              {{ trans('semester.action.new_semester') }}
            </a>
          </button>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="class">
          <table class="table table-bordered table-hover">
            @include('admin.semesters._header')
            @foreach($semesters as $semester)
              @include('admin.semesters._semester')
            @endforeach
          </table>
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
