<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- lotie -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.5.9/lottie.min.js" type="text/javascript"></script>


    <meta src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    <meta src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>


    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/app.css">


    <!-- Swiper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">

</head>
<body>
    @csrf
    <title>@yield('title')</title>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#FFFFFF; margin:bottom: -10px;">
        <a class="navbar-brand " href="/index">Beyou</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ action('IndexController@show_Hists', $user_id  ) }}">回答履歴を見る</a>
            </li>
          </ul>

          <!-- <ul class="navbar-nav ,gnav">
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               @isset($user){{ $user }} @endisset
             </a>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{action('Auth\LoginController@logout')}}">ログアウト</a>
             </div>
            </li>
          </ul> -->

          <ul class="gnav">
              <li>
                  <a href="">メニュー</a>
                  <ul>
                      <li>
                          <a href={{ route('logout') }} onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('ログアウト') }}
                            </a>
                            <form id='logout-form' action={{ route('logout')}} method="POST" style="display: none;">@csrf</form>
                      </li>
                      <li>
                          <a href='/contact'>お問い合わせ</a>
                      <li>
                  </ul>
              </li>
          </ul>


        </div>
    </nav>



    @yield('content')



    <!-- js読み込み -->
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src=" {{ mix('js/app.js') }} "></script>
</body>
</html>
