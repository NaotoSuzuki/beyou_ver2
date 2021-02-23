@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')

    <div class = "top_copy , text-center">
        <div class = main-copy><h2>答え合わせをしましょう</h2></div>
        <div class = sub-copy><p>満点を取れるまでトライしてくださいね！</p></div>
    </div>



    <form class="q_container" action = "{{url('/questions/answer/save')}}" name = "save" method = "post">
    <div class = "container, q_container">
    @csrf
            <?php foreach($answeredQuestions as $key  => $bigQ_record) :?>

                <div class="row">
                    <?php $option_num = $bigQ_record["option_num"] ?>
                    <?php $count  =  count($bigQ_record["questions"]) ?>
                    <?php $trueCount = $count-1 ?>

                    <div class="col-sm-12, col-md-12">
                        <div class="centering-block">
                            <div class="centering-block-inner">

                                <h5> <?php echo "Q".$key.".".$bigQ_record["big_question"] ?> </h5>
                                <?php for($i  =  0; $i<= $trueCount; $i++) :?>

                                    <?php $num = $i+1 ?>
                                    <?php $user_answer  =  $num.$bigQ_record["questions"][$i] ?>
                                    <?php $roop_answers[] = ["big_questions_id" => $key, "question_num" => $num,"user_answer" => $user_answer]?>
                                    <b><p><?php echo "(".$num.")".$bigQ_record["questions"][$i] ?></p></b>
                                    <strong><?php echo $bigQ_record["checked_result"][$i] ?></strong>
                                    あなたの答え : <strong class = "marker"><?php echo $small_answers[$key][$num] ?></strong>
                                    <p>答え : <strong><?php echo $bigQ_record["answers"][$i] ?></strong></p>

                                    <input type = "hidden" name = "user_answer[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $small_answers[$key][$num] ?>">
                                    <input type = "hidden" name = "result[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $bigQ_record["checked_value"][$i] ?>" >

                                <?php endfor ?>
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            </div>

            <div class="submit">
                <input type = "submit" name = "save" value = "結果を保存する(復習の参考にできます！)" />
            </div>

			<input type = "hidden" name = "genre_value" value  =  "{{$genre_value}}"/>
            <input type = "hidden" name = "user_id" value  =  "{{$user_id}}"/>
            <input type = "hidden" name = "option_num" value  =  "{{$option_num}}"/>
            <input type = "hidden" name = "small_answers" value = "<?php $roop_answers?>"/>


		</form>

    <div class="back-top">
         <button type="button" class="btn btn-primary" onclick="history.back()">
         問題を解きなおす
         </button>
         <button type="button" class="btn btn-primary">
         <a href="/" class="header-menu">トップページに戻る</a>
        </button>
    </div>

@endsection
