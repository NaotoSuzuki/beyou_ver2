@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')


<h1 class ="basic_color">"{{$created}}"に解いた"{{$genre}}"の問題の結果です！</h1>


    <form class="container, q_container">
        <div class = "container, q_container">

            <?php foreach($hist_indicates as $key =>  $hist_indicate) :?>
                <div class = "row">

                    <?php $count = count($hist_indicates) ?>
                    <?php $trueCount = $count-1 ?>

                    <div class="col-sm-12, col-md-12">
                        <div class="centering-block">
                            <div class="centering-block-inner">
                        <h5><?php echo $key.".".$hist_indicate["big_question"] ?></h5>


                        <?php for($i = 0; $i <= $trueCount; $i++) :?>
                            <?php $num = $i+1 ?>


                                    <p><?php echo "(".$num.")".$hist_indicate["questions"][$i] ?></p>
                                    <p>答え : <strong><?php echo $hist_indicate["answers"][$i] ?></strong></p>

                                    <?php if($hist_indicate["user_answers"][$i] !=  ""):?>
                                        <p>あなたの答え : <strong class = "marker"><?php echo $hist_indicate["user_answers"][$i] ?></p></strong>
                                    <?php else :?>
                                        <strong><p>回答が未入力でした</p></strong>
                                    <?php endif ?>

                                    <?php if($hist_indicate["user_result"][$i] == "1"):?>
                                        <strong><p>正解</p></strong>
                                    <?php elseif($hist_indicate["user_result"][$i] == "0") :?>
                                        <strong><p>間違い</p></strong>
                                    <?php else :?>
                                        <strong><p>結果が未入力でした</p></strong>
                                    <?php endif ?>


                            <?php endfor ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach ?>
            </div>


            </form>

                <div class="back-top">
                     <!-- <button type="button" class="btn btn-primary">
                     <a href ="{{ action('QuestionController@showQuestions', $genre_value) }}">問題を解きなおす</a>
                     </button> -->
                     <button type="button" class="btn btn-primary">
                     <a href="/" class="header-menu">トップページに戻る</a>
                    </button>
                </div>



                @endsection
