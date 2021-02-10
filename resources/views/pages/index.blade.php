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




                <div class="col-sm-4">
                    <div class = "box">
                        <p>{{$genre_post->genre}}</p>

                        <!-- <p><a href ="{{ action('QuestionController@showQuestions', $genre_post->genre_value) }}">問題を解く</a></p>-->
                        <p><a href ="{{ action('IndexController@options', $genre_post->genre_value) }}">問題を解く</a></p>
                        <p><a href ="{{ action('IndexController@explain', $genre_post->genre_value) }}">解説を読む</a></p>



                        @php
                            $modal_title = $genre_post->title;
                            $modal_content = $genre_post->content;
                        @endphp


                        <!-- モーダルの定義はbootstrap.jsに記載 -->
                            <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-title="{{$modal_title}}" data-content="{{$modal_content}}">ひらくよ</a>
                            <div class="modal fade" id="myModal">
                            	<div class="modal-dialog">
                            		<div class="modal-content">

                            			<div class="modal-header">
                                             <div class="modal-title">
                                            </div>
                            			</div>

                            			<div class="modal-body">
                            			</div>

                            		</div>
                            	</div>
                            </div>
                    </div>
                </div>
         @endforeach
        </div>
    </div>



@endsection
