@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
</h1>
{!! nl2br(e($user_name)) !!}"文法"です。
    <div class = "container , text-center">
        <div class="row">
            {{$genre_value}}
         </div>
    </div>
    
@endsection
