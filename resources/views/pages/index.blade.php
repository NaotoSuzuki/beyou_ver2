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

    <div class="content">
        <a class="js-modal-open" href="">クリックでモーダルを表示</a>
    </div>

    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>
            <p style="font-weight: bold;">ちゃんと表示できますか？</p><br>
            <p>こういう文章でも</p>
            <p>いいんですか</p>
            <a class="js-modal-close" href="">閉じる</a>
        </div><!--modal__inner-->
    </div><!--modal-->



<!-- モーダルウィンドウの中
モーダルウィンドウを開くボタン -->
<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">ひらくよ</a>
<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

			</div>
			<div class="modal-body">
                <p>ここにモーダルウィンドウで表示したいコンテンツを入れます。モーダルウィンドウを閉じる場合は下の「閉じる」をクリックするか、背景の黒い部分をクリックしても閉じることができます。</p>
                <p style="font-weight: bold;">ちゃんと表示できますか？</p><br>
                <p>こういう文章でも</p>
                <p>いいんですか</p>
			</div>
		</div>
	</div>
</div>


    <div class = "container , text-center , basic_color">
        <div class="row">
         @foreach($genres_data as $genre_data)
                <div class="col-sm-4">
                    <div class = "box">
                        <p>{{$genre_data->genre}}</p>

                        <!-- <p><a href ="{{ action('QuestionController@showQuestions', $genre_data->genre_value) }}">問題を解く</a></p>-->
                        <p><a href ="{{ action('IndexController@options', $genre_data->genre_value) }}">問題を解く</a></p>
                        <p><a href ="{{ action('IndexController@explain', $genre_data->genre_value) }}">解説を読む</a></p>
                        
                    </div>
                </div>
         @endforeach
        </div>
    </div>
@endsection
