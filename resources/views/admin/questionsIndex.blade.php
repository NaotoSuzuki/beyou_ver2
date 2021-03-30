@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')


 <!-- ループ回数と文法が対応しているので、ループ回数と文法IDで解説を取得する -->




    <div class = "container , text-center , basic_color">
        <div class="row">
         @foreach($genres_posts as $genre_post)
         @php
         $genre_value = $genre_post->genre_value;
         @endphp


                <div class="col-sm-3">
                    <div class="box">
                        <div class="genre_name"><p>{{$genre_post->genre}}</p></div>
                        <a href ="{{ url('/admin/manage_questions/options', $genre_value) }}">オプションと問題の作成、編集</a>
                        <br>

                    </div>
                </div>
         @endforeach
             <div class="back-top">
               <a href="/admin" class="header-menu">
               <button type="button" class="btn btn-primary">
                   管理トップに戻る
               </button>
               </a>
             </div>
        </div>
    </div>



@endsection
