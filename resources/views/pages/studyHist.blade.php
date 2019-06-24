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
    
        <h1 class ="basic_color">あなたの回答履歴です！</h1>
    
    <div class="back-top">
    <a href="/" class="header-menu,  basic_color">トップページに戻る</a>
    </div>

    <div class = "container , text-center,  basic_color">
     
        <?php $time = 0 ?>
            <ul class="list-group ">
              
            
           
                             <?php foreach($hist_arrays as $hist_array): ?>

                    
                   
                              <?php if($time == 0 || $time !== $hist_array->created) :?>

                            
                                <?php $created = $hist_array->created ?>
                                <?php $genre = $hist_array->genre ?>
                                <?php $genre_value = $hist_array->genre_value ?>
                                  
                                        <form class="form-group" action = "{{url('/hists/hist_detail')}}" method="post">
                                            @csrf
                                            {{$created}}　{{$genre}}  
                                
                                            <input type = "hidden" name = "genre_value" value = "{{$genre_value}}">
                                            <input type = "hidden" name = "created" value  =  "{{$created}}"/>
                                            <input type = "submit" name="" value = "詳細" />
                                        </form>   
                
                        <?php endif ?>
                    <?php $time =$created?>
       
                <?php endforeach?>
                </ul>
      
    </div>
@endsection