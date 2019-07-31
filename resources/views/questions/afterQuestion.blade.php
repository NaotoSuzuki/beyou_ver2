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

    <div class = "container , text-center">
    <h1>回答お疲れさまでした！</h1>
    
    <h5><a href="/" class="header-menu">トップページに戻る</a></h5>
    <h5><a href="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></h5>
    <h5><a href="/questions/question/{{$genre_value}}" class="header-menu">同じ問題をやり直す</a></h5>
    
    </div>
@endsection
