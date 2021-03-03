@php
$user = $user_name;
$user_id;
@endphp

@extends('layouts.default')

@section('title', 'Beyou')

@section('content')


<h1 class ="basic_color">"{{$created_date}}"に解いた"{{$genre}}"の問題の結果です！</h1>


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


                                    <?php echo "(".$num.")".$hist_indicate["questions"][$i] ?>
                                    <br>
                                    答え : <strong><?php echo $hist_indicate["answers"][$i] ?></strong>
                                    <br>

                                    <?php if($hist_indicate["user_result"][$i] == "1"):?>
                                        <?php $color = 'red'; $check_value = "◎" ?>

                                    <?php elseif($hist_indicate["user_result"][$i] == "0") :?>
                                        <?php $color = 'blue'; $check_value = "☓"?>

                                    <?php else:?>
                                        <?php $color = 'orange'; $check_value = "回答が未入力でした。"?>
                                    <?php endif ?>

                                    <span style="color: <?php echo $color; ?>"><?php echo $check_value; ?></span>
                                    あなたの答え : <strong class = "marker"><?php echo $hist_indicate["user_answers"][$i] ?></strong>
                                    <br>
                                    <br>
                            <?php endfor ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endforeach ?>
            </div>


            </form>

                <div class="back-top">
                    <button type="button" class="btn btn-primary" onclick="history.back()">
                    <a>履歴一覧に戻る</a>
                    </button>

                    <a href="/index" class="header-menu">
                    <button type="button" class="btn btn-primary">
                        トップページに戻る
                    </button>
                    </a>
                </div>



                @endsection
