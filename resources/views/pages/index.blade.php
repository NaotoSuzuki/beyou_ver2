@extends('layouts.default')

@section('title', 'Beyou')

@section('content')




    <div class="cp_navi">
        <ul>
            <li><a class="active" href="/">Beyou</a></li>
            <li><a href="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></li>
            <li class="right">
                <a href="">{{$user_name}} <span class="caret"></span></a>
                <div>
                    <ul>
                        <li><a href="{{action('Auth\LoginController@logout')}}">ログアウト</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class = "top_copy , text-center">
        <div class = main-opy><h2>学べる文法一覧</h2></div>
        <div class = sub-copy><p>気にしている文法からやってみましょう！</p></div>
    </div>

    <div class = "container , text-center">
        <div class="row">
         @foreach($genres_data as $genre_data)
                <div class="col-sm-4">
                    <div class = "box">
                        <p>{{$genre_data->genre}}</p>
                        <p><a href ="{{ action('QuestionController@showQuestions', $genre_data->genre_value) }}">問題を解く</a></p>
                        
                    </div>
                </div>
         @endforeach
        </div>
    </div>
@endsection
