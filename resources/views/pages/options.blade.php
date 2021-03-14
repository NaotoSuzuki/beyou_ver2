
@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')




    <div class = "top_copy , text-center">
        <div class = "basic_color"><h2>{{$genre}}の問題一覧</h2></div>
        <div class = "sub-copy, basic_color"><p>{{$genre_describe}}</p></div>
    </div>

    <div class = "container , text-center , basic_color">

        @foreach ($option_datas as $option_data)
        @php
            $option_num = $option_data->option_num;
            $option_name = $option_data->option_name;
            $option_detail = $option_data->option_detail;
            $modal_title = $option_data->option_describe_title;
            $modal_content = $option_data->option_describe;
            $key = $option_num - 1;
        @endphp


         <form class='option_container' action = "{{url('/questions/question')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
               <strong><?php  echo $genre.$option_num ?> </strong>：
               <?php echo $option_detail ?>

            <!-- <a href ="{{ action('QuestionController@showQuestions', $option_num) }}">問題を解く</a> -->
            <input type = "hidden" name = "option_num" value = "{{$option_num}}"/>
            <input type = "hidden" name = "genre_value" value = "{{$genre_value}}"/>
            <input type = 'submit' value= '問題を解く'>
            <a sytle="font-color:white" data-toggle="modal" data-target="#optionModal" data-title="{{$modal_title}}" data-content="{{$modal_content}}">
                説明を読む
            </a>
            <!-- ユーザーが変更できないようにする -->

            @if($optionAnswered[$key] === 0)
            <input type="hidden" name="" value="0">
            <input type="checkbox"  disabled='disabled'>
            @else
            <input type="hidden"  value="1">
            <input type="checkbox"  disabled='disabled' checked='checked'>
            @endif



            <div class="modal fade" id="optionModal">
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
         </form>

        @endforeach

    </div>

    <div class="back-top">
        <a href="/index" class="header-menu">
        <button type="button" class="btn btn-primary">
            トップページに戻る
        </button>
        </a>
    </div>

@endsection
