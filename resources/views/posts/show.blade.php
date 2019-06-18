

@extends('layouts.manage_default')

@section('title', $title)

@section('content')

  <h1>
    <a href="{{ url('/') }}" class="header-menu">Back</a>
    {{ $title }}
  </h1 >

  <p>{!! nl2br(e($body)) !!}</p>
@endsection

