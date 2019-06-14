@extends('layouts.default')

@section('title', 'Edit Post')

@section('content')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>

<h1>
  <a href="{{ url('/posts/index') }}" class="header-menu">Back</a>
  Edit Post
</h1>

<form method="post" action="{{ url('/posts', $post->id) }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  <p>
    <input type="text" name="title" placeholder="enter title" value="{{ old('title', $post->title) }}">


  <p>
    <input type="text" name="genre" placeholder="文法名(genre)" value="{{ old('genre', $post->genre) }}">
  
  </p>

  <p>
    <input type="text" name="genre_value" placeholder="文法の値(genre_value)" value="{{ old('genre_value', $post->genre_value) }}">

  </p>

  <p>
    <textarea name="body" placeholder="enter body">{{ old('body', $post->body) }}</textarea>
    @if ($errors->has('body'))
    <span class="error">{{ $errors->first('body') }}</span>
    @endif
  </p>



  <p>
    <input type="submit" value="Update">
  </p>
</form>

@endsection