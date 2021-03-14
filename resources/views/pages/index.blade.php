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


 <!-- ループ回数と文法が対応しているので、ループ回数と文法IDで解説を取得する -->




    <div class = "container , text-center , basic_color">
        <div class="row">
         @foreach($genres_posts as $genre_post)


                <div class="col-sm-3">
                    <div class="box">
                    <div class="genre_name"><p>{{$genre_post->genre}}</p></div>

                    @php
                        $modal_title = $genre_post->title;
                        $modal_content = $genre_post->content;
                    @endphp
                    <a href ="{{ action('IndexController@options', $genre_post->genre_value) }}">問題を解く</a>
                    <br>
                    <!-- モーダルの定義はbootstrap.jsに記載 -->
                    <button type="button" class="btn btn-link mt-1">
                        
                    <a sytle="font-color:white" data-toggle="modal" data-target="#myModal" data-title="{{$modal_title}}" data-content="{{$modal_content}}">
                        説明を読む
                    </a></button>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                     <div class="modal-title"></div>
                                </div>
                                <div class="modal-body"></div>
                            </div>
                        </div>
                    </div>




                    </div>
                </div>
         @endforeach
        </div>
    </div>



@endsection
