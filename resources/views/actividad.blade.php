@extends('layout')

@section('content')

<h1>a</h1>

@if(Auth::user()->username==NULL)
    {{ Auth::user()->name }}
@else
    {{ Auth::user()->username }}
@endif

@endsection