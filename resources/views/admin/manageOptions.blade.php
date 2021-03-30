
@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')


<div class="back-top">
    <a href="/admin/manage_questions" class="header-menu">
    <button type="button" class="btn btn-primary">
        トップページに戻る
    </button>
    </a>
</div>

    <div class = "top_copy , text-center">
        <div class = "basic_color"><h2>学べる文法一覧</h2></div>
        <div class = "sub-copy, basic_color"><p>{{$genre_describe}}</p></div>
    </div>

    <div class = "container , text-center , basic_color">
        @foreach ($option_details as $key => $option_detail)
         <form class='option_container' action = "{{url('/admin/manage_questions/questions')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
               <!-- progateを参考にしたボックス -->
               <?php $option_num = $key + 1;  ?>
               <?php  echo $genre.$option_num ?>
            <input type="text" name="option_detail" value="" placeholder="{{$option_detail}}" >
            <!-- <a href ="{{ action('QuestionController@showQuestions', $option_num) }}">問題を解く</a> -->
            <input type = "hidden" name = "option_num" value = "{{$option_num}}"/>
            <input type = "hidden" name = "genre_value" value = "{{$genre_value}}"/>

            <input type = 'submit' value= '問題を編集する'>
            <a href = '/admin/manage_options' >オプションを変更する</a>

             </div>
         </form>

        @endforeach


    <form class='option_container'  action = "{{url('/admin/manage_questions/questions/create')}}" method="post">
       {{ csrf_field() }}
       <div class="row">

          <?php $option_num = $key + 2;  ?>
          <?php  echo $genre.$option_num ?>
       <input type="text" name="option_detail" value="" placeholder="{{$option_detail}}" >

       <!-- <a href ="{{ action('QuestionController@showQuestions', $option_num) }}">問題を解く</a> -->
       <input type = "hidden" name = "option_num" value = "{{$option_num}}"/>
       <input type = "hidden" name = "genre_value" value = "{{$genre_value}}"/>
       <input type = 'submit' value= '問題を追加する'>


        </div>
    </form>
</div>


@endsection
