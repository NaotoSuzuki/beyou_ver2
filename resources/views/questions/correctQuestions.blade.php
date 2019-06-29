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
        <div class = main-copy><h2>答え合わせをしましょう</h2></div>
        <div class = sub-copy><p>満点を取れるまでトライしてくださいね！</p></div>
    </div>
    

    <div class = "container , text-center">
    <form action = "{{url('/questions/answer/save')}}" name = "save" method = "post">
    @csrf
            <?php foreach($answeredQuestions as $key  => $bigQ_record) :?>
               
                <div class = "answer">

                    <?php $count  =  count($bigQ_record["questions"]) ?>
                    <?php $trueCount = $count-1 ?>

                        <div class="small-question">  
                        <h5> <?php echo "Q".$key.".".$bigQ_record["big_question"] ?> </h5>

                                    <?php for($i  =  0; $i<= $trueCount; $i++) :?>
                                   
                                        <?php $num = $i+1 ?>
                                        <?php $user_answer  =  $num.$bigQ_record["questions"][$i] ?>
                                        <?php $roop_answers[] = ["big_questions_id" => $key, "question_num" => $num,"user_answer" => $user_answer]?>

                                        <div class="small-form">

                                            <b><p><?php echo "(".$num.")".$bigQ_record["questions"][$i] ?></p></b>
                                            <p>あなたの答え : <strong class = "marker"><?php echo $small_answers[$key][$num] ?></strong></p>
                                            <p><strong><?php echo $bigQ_record["checked_result"][$i] ?></strong></p>
                                            <p>答え : <strong><?php echo $bigQ_record["answers"][$i] ?></strong></p>

                                            <input type = "hidden" name = "user_answer[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $small_answers[$key][$num] ?>">
                                            <input type = "hidden" name = "result[<?php echo $key ?>][<?php echo $num ?>]" value = "<?php echo $bigQ_record["checked_value"][$i] ?>" >
                                                                    
                                       </div>
                                    <?php endfor ?>

                        </div>        
                    <br>
                    <br>

                </div>

            <?php endforeach ?>

            <input type = "submit" name = "save" value = "結果を保存する(復習の参考にできます！)" />
			<input type = "hidden" name = "genre_value" value  =  "{{$genre_value}}"/>
            <input type = "hidden" name = "user_id" value  =  "{{$user_id}}"/>
            <input type = "hidden" name = "small_answers" value = "<?php $roop_answers?>"/>
            
            <div class="back-top">
                 <p><a href ="{{ action('QuestionController@showQuestions', $genre_value) }}">問題を解きなおす</a></p>
                  <a href="/" class="header-menu">トップページに戻る</a>
            </div>

		</form>
    </div>
    
@endsection
