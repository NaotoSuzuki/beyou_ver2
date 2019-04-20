@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="{{ url('/posts/create') }}" class="header-menu">Beyou</a>
  文法を選んでください。
</h1>
<ul>
    @foreach($genres_data as $genre_data)
        <li>{{$genre_data->genre}}</li>
    @endforeach
</ul>
<script src="/js/main.js"></script>
@endsection
