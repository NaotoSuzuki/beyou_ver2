
@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')



    <div class = "top_copy , text-center">
        <div class = main-copy><h2>{{$genre_value}}{{$option_num}}の問題</h2></div>

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

      <!-- まず、optionManageでうまくoptionsのデータが取得できておらず、一見しか表示されていない。
    問題作成ページは次の用な感じにする。  BigQuestionはbig_idを指定するようにする。。小問題は、「小問題を追加」的なボタンを用意する。入力欄には"small_questions"のquestion.answerに必要なテキストエリアを準備する
    要はsmall_qusetionsに必要な情報の入力欄をつくるだけ -->


            <!-- 回答入力フォーム -->
            <form class="q_container" action = "{{url('/admin/manage_questions/questions/storeQuestions')}}" method="post" autocomplete="off">

                <div class = "container, q_container">
                 <fieldset class = 'text'>

                    @csrf
                    @method('POST')
                    <field>
                    <br>
                    <input type="hidden" name="genre_value" value="{{$genre_value}}">
                    <input type="hidden" name="option_num" value="{{$option_num}}">


                    大問題番号<select name="big_question_id" class="big_question_num">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                    </select>
                    <!-- <button type="button" class="btn-clone-bigNum">大問番号追加</button>
                    <button type="button" class="btn-remove-bigNum">remove</button> -->

                    <br>
                    <div class = 'smalls'>
                        小問題番号<select name="question_nums[]" class="small_question_num">
                          <option value="1" selected>1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>

                        <br>
                        <input type="textarea" name="questions[]" placeholder="問題内容" class="question" value="">
                        <!-- <button type="button" class="btn-clone-question">問題内容追加</button>
                        <button type="button" class="btn-remove-question">remove</button> -->
                        <br>
                        <input type="textarea" name="answers[]" placeholder="答え" class="answer" value="">
                        <!-- <button type="button" class="btn-clone-answer">答え追加</button>
                        <button type="button" class="btn-remove-answer">remove</button> -->
                        <br>
                        <br>
                    </div>

                    <button type="button" class="btn-clone-smallNum">小問追加</button>
                    <button type="button" class="btn-remove-smallNum">remove</button>
            </fieldset>
            <button type="button" class="btn-clone">大問題追加</button>
            <button type="button" class="btn-remove">remove</button>

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
