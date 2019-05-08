@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
    <h1>
      <a href="/" class="header-menu">Beyou</a>
    </h1>
    
    <p>{!! nl2br(e($user_name)) !!}"文法"です。</p>
    {{$genre_value}}
    <form action = "{{url('/questions/answer')}}" method="post">
    @csrf
      @foreach($questions as $key => $bigQ_record)
               <div class="answer">
                <?php $count = count($bigQ_record["questions"]) ?>
                <?php $trueCount = $count-1 ?>
                <?php echo $key.".".$bigQ_record["big_question"] ?><br>
                    <?php for($i = 0; $i <= $trueCount; $i++) :?>
                        <?php $num = $i+1 ?>
                        <?php $user_answer = $num.$bigQ_record["questions"][$i] ?>
                        <?php echo "(".$num.")".$bigQ_record["questions"][$i] ?><br>
                      <input type = "text" name = "small_answers[<?php echo $key ?>][<?php echo $num ?>]">
                      <br>
                    <?php endfor ?>
                <br>
                <br>            
        @endforeach
        <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
			<input type = "submit" name="" value = "答え合わせをする" />
		</form>
    
    
@endsection
