@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
   
</h1>
回答お疲れさまでした！

    <a href="/" class="header-menu">トップページに戻る</a>
    <a href="/" class="header-menu">今回の結果を見直す</a>
    <a href="/pages/study_hist/{{$genre_value}}" class="header-menu">勉強履歴を見る</a>
    <a href="/questions/question/{{$genre_value}}" class="header-menu">同じ問題をやり直す</a>
    <p></p>
    <div class = "container , text-center">
        <div class="row">
         
        </div>
    </div>
@endsection