@extends('layouts.app')

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
<<<<<<< HEAD
<h1>
  <!-- <a href="/" class="header-menu"></a> -->
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
=======
>>>>>>> master
@endsection
