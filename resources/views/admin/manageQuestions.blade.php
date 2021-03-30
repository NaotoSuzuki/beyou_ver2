
@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')



    <div class = "top_copy , text-center">
        <div class = main-copy><h2>{{$genre}}の問題です！</h2></div>

          <div class="text">入力欄に新たな問題を記入し、"反映"ボタンを押下して反映</div>


    </div>


    @if ($errors->any())
        <div class="errors">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif



            <!-- 回答入力フォーム -->
            <form class="q_container" action = "{{url('/admin/manage_questions/questions')}}" method="post" autocomplete="off">
                <div class = "container, q_container">
                @csrf
                @method('PATCH')

                <?php foreach ($big_records as $big_record):?>

                    <div class="row">
                        <div class="col-sm-12, col-md-12">
                            <div class="centering-block">
                                <div class="centering-block-inner">

                                <h5> <?php echo "Q".$big_record->id.".".$big_record->big_question ?> </h5>
                                <?php $key =  $big_record->id?>

                                    <?php $num = 0 ?>
                                    <?php foreach($small_records as  $small_record) :?>
                                        <?php $big_num = $small_record->big_question_id ?>
                                            <?php if($big_record->id == $big_num) :?>
                                            <?php $num++ ?>
                                                    <b><p><?php echo "(".$small_record->question_num.")".$small_record->question ?></p></b>
                                                        <input type="text" value="問題を入力" name="updated_questions[<?php echo $key ?>][<?php echo $num ?>]" style="top: -100px; left: -100px;　position: fixed;" >
                                                        <p>答え : <strong><?php echo $small_record->answer ?></strong></p>
                                                        <input type="text" value="答えを入力" name="updated_answers[<?php echo $key ?>][<?php echo $num ?>]" style="top: -100px; left: -100px;　position: fixed;" >
                                                        <br>
                                                    <br>
                                            <?php endif ?>
                                    <?php endforeach ?>


                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>



                <input type = "hidden" name = "genre_value" value = "{{$genre_value}}"/>
                <input type = "hidden" name = "option_num" value  = "{{$option_num}}"/>
                <div class="submit">
                <input type="button" onclick="submit();"  value = "反映">
                </div>

            </form>

            <div class="back-top">
              <button type="button" class="btn btn-primary" onclick="history.back()">
                  <a>問題一覧に戻る</a>
              </button>
              <a href="/admin/manage_questions" class="header-menu">
              <button type="button" class="btn btn-primary">
                  トップページに戻る
              </button>
              </a>
            </div>

@endsection
