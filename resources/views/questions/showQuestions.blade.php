@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
    <h1>
      <a href="/" class="header-menu">Beyou</a>
    </h1>
    
    <p>{!! nl2br(e($user_name)) !!}"文法"です。</p>
   
    <div class = "container , text-center">
        <div class="row">
            {{$genre_value}}
         </div>
    </div>

    @foreach($small_questions as $small_question)
      <div>
      {{$small_question->question}}
      </div>
    @endforeach
  
    
@endsection
