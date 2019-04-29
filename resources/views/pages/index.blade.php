@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
  文法を選んでください。
</h1>
    <div class = "container , text-center">
        <div class="row">
            @foreach($genres_data as $genre_data)
                <div class="col-sm-4">
                    <p>{{$genre_data->genre}}</p>
                    <p><a href ="{{ action('QuestionController@showQuestions', $genre_data->genre_value) }}">問題を解く</a></p>
                    <p><a href ="{{ action('IndexController@explain', $genre_data->genre_value) }}">{{$genre_data->genre}}とは</a></p>
                </div>

            @endforeach
        </div>
    </div>
@endsection
