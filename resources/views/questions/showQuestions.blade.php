@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
  "文法"です。
</h1>
    <div class = "container , text-center">
        <div class="row">
            {{$genre}}
         </div>
    </div>
@endsection
