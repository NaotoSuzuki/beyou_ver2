

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')
<a href='/admin/manage_options'>オプション一覧に戻る</a>

<div class="container , text-center , basic_color">
        <p>{!! nl2br(e($option->option_name)) !!}</p>
        <h1>{{ $option->option_detail }}</h1>
        <h2>{{ $option->option_describe_title }}</h2>
        <h2>{{ $option->option_describe_content }}</h2>
        <p><?= ($option->content) ?></p>

</div>

@endsection
