@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
   
</h1>
あなたの回答履歴です！

    <a href="/" class="header-menu">トップページに戻る</a>

    <p></p>
    <div class = "container , text-center">
        <div class="row">
        <?php $time = 0 ?>
                    <?php foreach($hist_arrays as $hist_array): ?>
                        <?php if($time == 0 || $time !== $hist_array->created) :?>
                            <div class="item">
                                 <a href = "study_hist_detail.php?name=<?php  echo $hist_array->created ?>">
                                    <p><?php echo $hist_array->genre."　".$hist_array->created ?></p>
                                </a>
                            </div>
                        <?php endif ?>
                    <?php $time = $hist_array->created?>
                <?php endforeach?>
         
        </div>
    </div>
@endsection