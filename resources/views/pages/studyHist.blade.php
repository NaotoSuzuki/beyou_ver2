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

    <ul class="list-group ">

    <?php foreach($hist_arrays as $hist_array): ?>
            <?php if($time == 0 || $time !== $hist_array->created_date) :?>

                <?php $created_date = $hist_array->created_date ?>
                <?php $genre = $hist_array->genre ?>
                <?php $genre_value = $hist_array->genre_value ?>

                <form class="form-group" action = "{{url('/hists/hist_detail')}}" method="post">
                    @csrf
                    {{$created_date}} {{$genre}}

                    <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                    <input type = "hidden" name = "created_date" value  =  "{{$created_date}}"/>
                    <input type = "submit" name="" value = "詳細" />
                </form>

            <?php endif ?>

        <?php endforeach?>
    </ul>

</div>


@endsection
