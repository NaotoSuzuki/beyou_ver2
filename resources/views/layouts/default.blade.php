<!DOCTYPE HTML>
<html lang="ja">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>@yield('title')</title>
     <link rel="stylesheet" href="/css/style.css">
     <script src="/js/app.js" defer></script>
</head>
<body>
    <div class = "container">
        @yield('content')
    </div>
</body>
</html>
