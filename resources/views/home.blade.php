@extends('template.base')
@section('title') Home @endsection
@section('content')
<h1>Welcome to my website</h1> <label>{{ \Auth::User()->email }}</label>
@endsection