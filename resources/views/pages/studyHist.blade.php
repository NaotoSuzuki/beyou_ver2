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
                            <?php $created = $hist_array->created ?>
                            <?php $genre_value = $hist_array->genre ?>
                                <a href =  "{{ action('IndexController@histDetail', $created, $genre_value) }}">
                                <p><?php echo $genre_value."　".$created ?></p>
                                </a>
                            </div>
                        <?php endif ?>
                    <?php $time =$created?>
                <?php endforeach?>
         
        </div>
    </div>
@endsection