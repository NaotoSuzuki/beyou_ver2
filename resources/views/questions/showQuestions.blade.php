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



    <div class="back-ground">
    <h1>
      <a href="/" class="header-menu">{{$genre}}の問題です！</a>
    </h1>
<div class = "container , text-center">

   
    <form action = "{{url('/questions/answer')}}" method="post">
    @csrf
      @foreach($questions as $key => $bigQ_record)
      <?php $count = count($bigQ_record["questions"]) ?>
                <?php $trueCount = $count-1 ?>
                <?php echo $key.".".$bigQ_record["big_question"] ?><br>
                    <?php for($i = 0; $i <= $trueCount; $i++) :?>
                        <?php $num = $i+1 ?>
                        <?php $user_answer = $num.$bigQ_record["questions"][$i] ?>
                        <?php echo "(".$num.")".$bigQ_record["questions"][$i] ?><br>
                      <input type = "text" name = "small_answers[<?php echo $key ?>][<?php echo $num ?>]">
                      <br>
                  <?php endfor ?>
               <br>
               <br>
        @endforeach
        <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
        <input type = "hidden" name = "user_id" value  =  "{{$user_id}}"/>
			<input type = "submit" name="" value = "答え合わせをする" /><br>
      <a href="/" class="header-menu">トップページに戻る</a>
		</form>
   </div>
</div>   
@endsection
