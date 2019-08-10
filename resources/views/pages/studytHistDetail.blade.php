@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<div class="cp_navi">
    <ul>
        <li><a class="active,basic_color " href="/">Beyou</a></li>
        <li><a class="basic_color " href="{{ action('IndexController@show_Hists', $user_id) }}">回答履歴を見る</a></li>
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


<h1 class ="basic_color">"{{$created}}"に解いた"{{$genre}}"の問題の結果です！</h1>
<div class = "container , text-center, basic_color">

    <form class="basic_color">

            <?php foreach($hist_indicates as $key =>  $hist_indicate) :?>
                <div class = "answer">

                    <?php $count = count($hist_indicates) ?>
                    <?php $trueCount = $count-1 ?>

                    <div class="small-question">
                        <h5><?php echo $key.".".$hist_indicate["big_question"] ?></h5>


                        <?php for($i = 0; $i <= $trueCount; $i++) :?>
                            <?php $num = $i+1 ?>

                                        <div class="small-form"><b>
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

                                    </div>
                            <?php endfor ?>
                            </div>


            <?php endforeach ?>

                            <div class="back-top">
                                <p><a href ="{{ action('QuestionController@showQuestions', $genre_value) }}">問題を解きなおす</a></p>
                                <a href="/" class="header-menu">トップページに戻る</a>
                            </div>

                </form>
            </div>


                @endsection
