@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')


    <div class = "container , text-center">
    <h1>回答お疲れさまでした！</h1>

    <h5><a href="/index" class="header-menu">トップページに戻る</a></h5>
    <h5><a href="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></h5>
    <h5><a href="/questions/question/{{$genre_value}}" class="header-menu">同じ問題をやり直す</a></h5>
    </div>
        <div id="lottie"></div>


@endsection
