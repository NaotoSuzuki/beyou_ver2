@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<div class="cp_navi">
        <ul>
            <li><a class="active" href="/">Beyou</a></li>
            <li><a href="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></li>
            <li class="right">
                <a href="">{{$user_name}} <span class="caret"></span></a>
                <div>
                    <ul>
                        <li><a href="{{action('Auth\LoginController@logout')}}">ログアウト</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

あなたの回答履歴です！

    <a href="/" class="header-menu">トップページに戻る</a>

    <p></p>
    <div class = "container , text-center">
        <div class="row">
        <?php $time = 0 ?>
                    <?php foreach($hist_arrays as $hist_array): ?>
                        <?php if($time == 0 || $time !== $hist_array->created) :?>
                            <div class="item">
                                <?php $created = $hist_array->created ?>
                                <?php $genre = $hist_array->genre ?>
                                <?php $genre_value = $hist_array->genre_value ?>
                            
                                    <form action = "{{url('/hists/hist_detail')}}" method="post">
                                    @csrf
                                            <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                                                <input type = "hidden" name = "created" value  =  "{{$created}}"/>
                                                <input type = "submit" name="" value = "<?php echo $genre."　".$created ?>" />
                                  </form>   
                             
                            </div>
                        <?php endif ?>
                    <?php $time =$created?>
                <?php endforeach?>
         
        </div>
    </div>
@endsection