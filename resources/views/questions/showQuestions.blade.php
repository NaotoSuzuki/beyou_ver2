@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')


    <div class = "top_copy , text-center">
        <div class = main-copy><h2>{{$genre}}の問題です！</h2></div>

          <div class="text">力をつけるために、</div>
          <div class="text">わからなくても回答入力しましょう！</div>
          <p>(文末にピリオドやクエスチョンマークをお忘れなく)</p>

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




            <form class="q_container" action = "{{url('/questions/answer')}}" method="post" autocomplete="off">
                <div class = "container, q_container">
                @csrf
                @foreach($questions as $key => $bigQ_record)
                    <div class="row">

                        <?php $count = count($bigQ_record["questions"]) ?>
                        <?php $trueCount = $count-1 ?>



                                <div class="col-sm-12, col-md-12">

                                    <div class="centering-block">
                                        <div class="centering-block-inner">

                                    <h5><?php echo "Q".$key.".".$bigQ_record["big_question"] ?></h5>
                                    <?php for($i = 0; $i <= $trueCount; $i++) :?>
                                    <?php $num = $i+1 ?>
                                    <?php $user_answer = $num.$bigQ_record["questions"][$i] ?>
                                      <!-- <div class="small-form"> -->
                                    <b><p><?php echo "(".$num.")".$bigQ_record["questions"][$i] ?></p></b>

                                    <input type="text" name="small_answers[<?php echo $key ?>][<?php echo $num ?>]" style="top: -100px; left: -100px;　position: fixed;" >
                                      <!-- </div> -->
                                    <?php endfor ?>
                                    <br>
                                    <br>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                <input type = "hidden" name = "user_id" value  =  "{{$user_id}}"/>

                <div class="submit">
                <input type="button" onclick="submit();"  value = "答え合わせをする">
                </div>

            </form>

            <div class="back-top">
              <button type="button" class="btn btn-primary">
                  <a href="/" class="header-menu">トップページに戻る</a>
              </button>
            </div>

@endsection
