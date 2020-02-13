
@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')




    <div class = "top_copy , text-center">
        <div class = "basic_color"><h2>学べる文法一覧</h2></div>
        <div class = "sub-copy, basic_color"><p>{{$genre_describe}}</p></div>
    </div>

    <div class = "container , text-center , basic_color">
        @foreach ($option_details as $key => $option_detail)
         <form action = "{{url('/questions/question')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
               <!-- progateを参考にしたボックス -->
               <?php $option_num = $key + 1;  ?>
               <?php  echo $genre.$option_num ?>
               <?php echo $option_detail ?>


            <!-- <a href ="{{ action('QuestionController@showQuestions', $option_num) }}">問題を解く</a> -->
            <input type = "hidden" name = "option_num" value = "{{$option_num}}"/>
            <input type = "hidden" name = "genre_value" value = "{{$genre_value}}"/>
            <input type = 'submit' value= '問題を解く'>


             </div>
         </form>

        @endforeach



    </div>
@endsection
