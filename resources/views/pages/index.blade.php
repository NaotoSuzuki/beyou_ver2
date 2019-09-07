@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')




    <div class = "top_copy , text-center">
        <div class = "basic_color"><h2>問題一覧</h2></div>
        <div class = "sub-copy, basic_color"><p>気にしている文法からやってみましょう！</p></div>
    </div>

    <div class = "container , text-center , basic_color">
        <div class="row">
         @foreach($genres_data as $genre_data)
                <div class="col-sm-4">
                    <div class = "box">
                        <p>{{$genre_data->genre}}</p>

                        <p><a href ="{{ action('QuestionController@showQuestions', $genre_data->genre_value) }}">問題を解く</a></p>
                        <!-- <p><a href ="{{ action('IndexController@options', $genre_data->genre_value) }}">問題を解く</a></p> -->
                        <p><a href ="{{ action('IndexController@explain', $genre_data->genre_value) }}">解説を読む</a></p>
                    </div>
                </div>
         @endforeach
        </div>
    </div>
@endsection
