@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="{{ url('/posts/create') }}" class="header-menu">New Post</a>
  Blog Posts
</h1>
<ul>
  <li></li>
</ul>
<script src="/js/main.js"></script>
@endsection
