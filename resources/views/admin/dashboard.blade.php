@extends('layouts.admin')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="admin-dashboard">
        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <div class="panel widget bg-purple">
                        <div class="row row-table">
                            <div class="col-xs-4 bg-purple-dark text-center pv-lg"><i class="fa fa-user fa-3x"></i></div>
                            <div class="col-xs-8">
                                <div class="huge">{{ $usersCount }}</div>
                                <span>{{ str_plural('Member', $usersCount) }}</span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@stop
