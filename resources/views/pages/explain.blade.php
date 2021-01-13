@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a class = "basic_color" href="/" class="header-menu">Beyou</a>
  {{$genre}}の解説です。
</h1>
    <div class = "container , text-center">
        <div class="row , basic_color">
            {{$genre}}
         </div>
    </div>
@endsection
