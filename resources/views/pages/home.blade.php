@extends('layouts.app')
@section('content')
  @if (auth()->guest())
    "hello"
  @else
    "sida"
  @endif
@stop
