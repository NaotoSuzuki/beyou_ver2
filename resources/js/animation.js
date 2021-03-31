var params = {
    // アニメーションを表示したい要素(今回はlottieというidを付けて取得しています。)
    container: document.getElementById('lottie'),
    // アニメーションをsvg形式で出力
    renderer: 'svg',
    // アニメーションをループする
    loop: false,
    // アニメーションを読み込んだら自動で再生する
    autoplay: true,
    // アニメーションファイル(.json)のパス
    path: "/animation.json"
};

var anim = lottie.loadAnimation(params);
