@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
<h1>
  <a href="/" class="header-menu">Beyou</a>
  文法を選んでください。
  <br>
  {{$user_id}}
  <p><a href ="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></p>
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
