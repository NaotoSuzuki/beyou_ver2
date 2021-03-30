

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')
<a href='/admin/index_explanation'>解説一覧に戻る</a>

<div class="container , text-center , basic_color">
        <p>{!! nl2br(e($post->genre_code)) !!}</p>
        <h1>{{ $post->title }}</h1>
        <p><?= ($post->content) ?></p>

</div>

@endsection
