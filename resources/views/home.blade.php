@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="content-row">
            <h1>中学までの文法をやり直そう！</h1>
            <h2><strong>Beyouでできること=「解いて、間違えて、やり直す、覚える→...」</strong></h2>
            <p><strong>「試す、間違える、やり直す」</strong>このサイクルで、我々は様々なことを身に着けているはずです。</p>
            <p>身につけるために近道はなく、英語も例外ではないと思います。</p>
            <br>
            <p>Beyouでは、「解く、間違える、やり直す」のサイクルを各文法で</p>
            <p><strong>「好きなだけ」</strong>繰り返すことができます！</p>
            <p><strong>学習の記録</strong>も保存できるので、日々の成長を実感しましょう！</p>
            <br>
        </div>

        <div class='demo-row'>
            <h2>ちょっとしたデモ動画です。</h2>
            <p>以下はBeyouでの「問題選択から答え合わせ」までの流れです！</p>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/BN3i4XjA0LE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        </div>

            <button type="button" class="btn btn-primary">
                <a href="{{ route('register') }}">{{ __('無料会員登録') }}</a>
            </button>



        <div class="content-row">
            <h1>学習できる文法一覧</h1>
        </div>



        <div class="container">
          <div class="row">
                <div class="col-sm-4">
                 <ul>
                     <li>Be動詞</li>
                     <li>一般動詞</li>
                     <li>現在進行系</li>
                     <li>Be動詞の過去形</li>
                     <li>一般動詞の過去形</li>
                     <li>命令形</li>
                 </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li>未来系</li>
                        <li>不定詞</li>
                        <li>疑問詞</li>
                        <li>助動詞</li>
                        <li>比較級</li>
                        <li>受動態</li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <ul>
                        <li>接続詞</li>
                        <li>仮定法</li>
                        <li>現在・過去完了</li>
                        <li>関係代名詞</li>
                        <li>動名詞</li>
                        <li>その他・もう一つ</li>
                        <li>分詞</li>
                    </ul>
                </div>
              </div>
        </div>

        <div class="content-row">
            <p>さらに各文法に「疑問形、否定形、応用」などの問題が準備されています!</p>
        </div>


        <div class="stripe-row">
            <div class="content-row">
                <h1>Beyouができた背景</h1>
                <h2>〜<strong>無料でがっつり</strong>勉強できる学習サービスがほしかった〜</h2>
                <p>Beyouは個人作成のwebサービスです。</p>
                <p>作成者も英語学習中の身ですが、学習の過程で</p>
                <br>
                <p>「<strong>気軽にがっつり</strong>勉強できるサービスが意外とない」</p>
                <p>ということに気づき、素人ながら作成しました。</p>
                <br>
                <p>システム、レイアウトの素人感など、引き続き改善していく所存です。</p>
                <p>まだまだ未熟なBeyouですが、よかったらぜひ一緒に勉強していきましょう！</p>
            </div>
            <button type="button" class="btn btn-primary">
                <a href="{{ route('register') }}">{{ __('無料会員登録') }}</a>
            </button>
        </stripe>
    </div>



    <footer class="footer">
      <div class="container">
        <p class="text-muted">contact: crappy.naoto@gmail.com</p>
      </div>
    </footer>

@endsection
