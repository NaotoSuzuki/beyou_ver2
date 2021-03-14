@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')


<h1 class ="basic_color">あなたの回答履歴です！</h1>


<div class="back-top">
    <a href="/index" class="header-menu">
    <button type="button" class="btn btn-primary">
        トップページに戻る
    </button>
    </a>
</div>

<div class = "container , text-center,  basic_color">

    <?php $time = 0 ?>
    <?php $date = 0 ?>

    <ul class="list-group ">

    <?php foreach($hist_arrays as $hist_array): ?>

        <?php if($date == 0 || $date !== $hist_array->created_date) : ?>
            <?php $date = $hist_array->created_date ?>
            <p>{{$date}}の履歴</p>
        <?php endif ?>

            <?php if($time == 0 || $time !== $hist_array->created_at) :?>
                <?php $time = $hist_array->created_at ?>
                <?php $created_date = $hist_array->created_date ?>
                <?php $genre = $hist_array->genre ?>
                <?php $genre_value = $hist_array->genre_value ?>
                <?php $option_num = $hist_array->option_num ?>
                <?php $option_name = $hist_array->option_name ?>


                <form class="form-group" action = "{{url('/hists/hist_detail')}}" method="post">
                    @csrf
                    {{$time}} {{$option_name}}

                    <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                    <input type = "hidden" name = "created_at" value  =  "{{$time}}"/>
                    <input type = "hidden" name = "created_date" value  =  "{{$created_date}}"/>
                    <input type = "hidden" name = "option_num" value  =  "{{$option_num}}"/>
                    <input type = "hidden" name = "option_name" value  =  "{{$option_name}}"/>
                    <input type = "submit" name="" value = "詳細" />
                </form>

            <?php endif ?>

        <?php endforeach?>
    </ul>

</div>


@endsection
