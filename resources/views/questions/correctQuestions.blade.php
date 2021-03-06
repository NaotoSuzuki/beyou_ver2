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


    <?php $correct_counter = 0 ?>
    <?php foreach($answeredQuestions as $reuslt_key => $answeredQuestion) :?>
        <?php --$reuslt_key ?>
        <?php $result_values_array[] = $answeredQuestion["checked_value"];?>
        <?php  $result_count = count($result_values_array["$reuslt_key"]);?>
        <?php  --$result_count ?>
        <?php for($i = 0; $i <= $result_count; ++$i){
             if($result_values_array["$reuslt_key"]["$i"] == "1"){
                 ++$correct_counter;
             }
        }?>
    <?php endforeach ?>

    <h3>score: <span style="color: <?php echo 'red'; ?>"><?php echo($correct_counter)?></span>/10</h3>



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
                                <div class = "q_container_text_align_switch">
                                <h5> <?php echo "Q".$key.".".$bigQ_record["big_question"] ?> </h5>
                                <?php for($i  =  0; $i<= $trueCount; $i++) :?>

                                    <?php $num = $i+1 ?>
                                    <?php $user_answer  =  $num.$bigQ_record["questions"][$i] ?>
                                    <?php $roop_answers[] = ["big_questions_id" => $key, "question_num" => $num,"user_answer" => $user_answer]?>
                                    <b><p><?php echo "(".$num.")".$bigQ_record["questions"][$i] ?></p></b>


                                    <strong><?php
                                        if ($bigQ_record["checked_result"][$i]=="◎") {
                                            $color = 'red';
                                            }elseif($bigQ_record["checked_result"][$i]=="✖") {
                                                $color = 'blue';
                                            }else{
                                                $color = 'orange';
                                        }
                                    ?>
                                    <span style="color: <?php echo $color; ?>"><?php echo $bigQ_record["checked_result"][$i]; ?></span>
                                    </strong>

                                    あなたの答え : <strong class = "marker"><?php echo $small_answers[$key][$num] ?></strong>
                                    <p>回答例: <strong><?php echo $bigQ_record["answers"][$i] ?></strong></p>

                                    <input type = "hidden" name = "user_answer[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $small_answers[$key][$num] ?>">
                                    <input type = "hidden" name = "result[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $bigQ_record["checked_value"][$i] ?>" >

                                <?php endfor ?>
                                <br>
                                <br>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            </div>
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
         <a>問題を解きなおす</a>
         </button>
         <a href="/index" class="header-menu">
         <button type="button" class="btn btn-primary">
             トップページに戻る
         </button>
         </a>
    </div>

@endsection
