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


    <h1>"{{$created}}"に解いた"{{$genre}}"の問題の結果です！</h1>
    <div class = "container , text-center">

    <form>

        <?php foreach($hist_indicates as $key =>  $hist_indicate) :?>
        
        <div class = "answer">

            <?php $count = count($hist_indicates) ?>
            <?php $trueCount = $count-1 ?>

                <div class="small-question">  
                    <h5><?php echo $key.".".$hist_indicate["big_question"] ?></h5>

                    <?php for($i = 0; $i <= $trueCount; $i++) :?>
                        <?php $num = $i+1 ?>
                    
                        <div class="small-form">
                            <?php echo "(".$num.")".$hist_indicate["questions"][$i] ?><br>
                            <?php echo "答え".$hist_indicate["answers"][$i] ?>
                            <?php if($hist_indicate["user_answers"][$i] !=  ""):?>
                                <p><?php echo"あなたの答え: ".$hist_indicate["user_answers"][$i] ?></p>
                            <?php else :?>
                                <p>回答が未入力でした</p>
                            <?php endif ?>
                            <?php if($hist_indicate["user_result"][$i] == "1"):?>
                                <p>正解</p>
                            <?php elseif($hist_indicate["user_result"][$i] == "0") :?>
                                <p>間違い</p>
                            <?php else :?>
                                <p>結果が未入力でした</p>
                            <?php endif ?>
                        </div>
                    <?php endfor ?>

                
            </div>
        <?php endforeach ?>
    </form>
    </div>
    
@endsection