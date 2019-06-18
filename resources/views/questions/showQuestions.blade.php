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


    <div class = "top_copy , text-center">
        <div class = main-copy><h2>{{$genre}}の問題です！</h2></div>
        <div class = sub-copy><p>力をつけるために、わからなくても回答入力しましょう！</p></div>
    </div>
 

    @if ($errors->any())
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
   

     
      <div class = "container , text-center">
     
          <!-- formのスタイルはBoostrapで指定されている -->
            <form action = "{{url('/questions/answer')}}" method="post">
            
                @csrf
                @foreach($questions as $key => $bigQ_record)
                    <div class = "answer">
                          <?php $count = count($bigQ_record["questions"]) ?>
                          <?php $trueCount = $count-1 ?>
                             <div class="small-question">  

                                  <h5><?php echo "Q".$key.".".$bigQ_record["big_question"] ?></h5>
                         
                          
                                  <?php for($i = 0; $i <= $trueCount; $i++) :?>
                                  <?php $num = $i+1 ?>
                                  <?php $user_answer = $num.$bigQ_record["questions"][$i] ?>

                                  <div class="small-form">
                                    <p><?php echo "(".$num.")".$bigQ_record["questions"][$i] ?></p>

                                     <input type="input" name="small_answers[<?php echo $key ?>][<?php echo $num ?>]">
                                     
                                  </div>

                                  <?php endfor ?>
                             </div>
                   </div>   
                    <br>
                    <br>
                @endforeach

                <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                <input type = "hidden" name = "user_id" value  =  "{{$user_id}}"/>

                <div class="submit">
                  <input type = "submit" name="" value = "答え合わせをする" />
                </div>

                <div class="back-top">
                  <a href="/" class="header-menu">トップページに戻る</a>
                </div>
            </form>
      </div>    
  
@endsection
