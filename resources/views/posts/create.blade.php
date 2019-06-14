@extends('layouts.manage_default')

@section('title', 'New Post')

@section('content')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

<h1>
  <a href="{{ url('/posts/index') }}" class="header-menu">Back</a>
  New Post
</h1>

<form  action="{{ url('/posts') }}" method="post">
  {{ csrf_field() }}
  <p>
    <input type="text" name="title" placeholder="enter title">
  </p>
  <p>
    <input type="text" name="genre" placeholder="文法名（genre）">
  </p>
  <p>
    <input type="text" name="genre_value" placeholder="文法の値（genre_value）">
  </p>
  <p>
    <textarea name="body" placeholder="enter body"></textarea>
  </p>
  <p>
    <input type="submit" value="Add">
  </p>
</form>

@endsection