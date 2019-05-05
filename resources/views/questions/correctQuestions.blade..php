@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
    <h1>
      <a href="/" class="header-menu">Beyou</a>
    </h1>

    if (isset($_POST["save"])) {
        $results = $_POST["result"];
        $user_answer_array  =  $_POST["user_answer"];
        $answer_datas  =  formUserAnswer($user_id, $genre_param, $results, $user_answer_array, $big_records, $small_records);
        putUserAnwser($answer_datas);
        echo "結果を保存しました！";
    }
    
    <p>{!! nl2br(e($user_name)) !!}"文法"です。</p>
   
    <form action = "" name = "" method = "post">
            <?php foreach($questions as $key  => $bigQ_record) :?>
                <div class = "answer">
                    <?php $count  =  count($bigQ_record["questions"]) ?>
                    <?php $trueCount = $count-1 ?>
                    <?php echo $key.".".$bigQ_record["big_question"] ?><br>
                        <?php for($i  =  0; $i<= $trueCount; $i++) :?>
                            <?php $num = $i+1 ?>
                            <?php $user_answer  =  $num.$bigQ_record["questions"][$i] ?>
                            <?php $roop_answers[] = ["big_questions_id" => $key, "question_num" => $num,"user_answer" => $user_answer]?>
                            <?php echo "(".$num.")".$bigQ_record["questions"][$i] ?><br>
                            <?php echo "答え".$bigQ_record["answers"][$i] ?>
                            <p><?php echo"あなたの答え: ".h($small_answers[$key][$num]) ?></p>
                            <input type = "hidden" name = "user_answer[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $small_answers[$key][$num] ?>">
                            <input type = "checkbox" name = "result[<?php echo $key ?>][<?php echo $num ?>]" value = "1">正解した！</input><br>
                            <input type = "checkbox" name = "result[<?php echo $key?>][<?php echo $num ?>]" value = "0">間違えた！</input><br>
                        <?php endfor ?>
                    <br>
                    <br>
                </div>
            <?php endforeach ?>

            <input type = "submit" name = "save" value = "結果を保存する(復習の参考にできます！)" />
			<input type = "hidden" name = "genre" value  =  "<?php echo $genre_param;?>"/>
            <input type = "hidden" name = "small_answers" value = "<?php $roop_answers?>"/>

		</form>
  
    
@endsection
