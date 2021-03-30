

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')

<div class="container , text-center , basic_color">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">解説一覧</div>
            </div>
        </div>
    </div>
    <a href='/admin/index_explanation/create'>解説を投稿する</a>


        <ul>
            @foreach($posts as $post)
            <li>
                <span class="form_flex">

                 <a href="{{ route('admin.explanation.show', ['id' => $post->id]) }}" >{{$post->title}}</a>
                 <a href="{{ route('admin.explanation.edit', ['id' => $post->id]) }}" class="edit">[Edit]</a>

                     <form action="/admin/index_explanation/posts/{{$post->id}}" method="POST" class='form-inline'>
                         @method('DELETE')
                         @csrf
                          <input type="submit" value="削除" class="btn-dell">
                     </form>
                 </span>
            </li>
            @endforeach
        </ul>
</div>


@endsection
