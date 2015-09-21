@extends('layouts.app')
@section('title', 'Homepage')
@section('content')
  @if (auth()->guest())
    "hello"
  @else
    "sida"
  @endif
@stop
