

@extends('layouts.manage_default')

@section('title', $title)

@section('content')

  <h1>
    {{ $genre }}の解説
    
  </h1 >
  <div>
  <a href="{{ url('/') }}" class="header-menu">Top</a><br>
  </div>

  <p>{!! nl2br(e($body)) !!}</p>

  <p><a href ="{{ action('QuestionController@showQuestions', $genre_value) }}">問題を解く</a></p>
@endsection

