

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')

<div class="container , text-center , basic_color">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">オプション一覧</div>
            </div>
        </div>
    </div>
    <a href='/admin/index_options/create'>オプションを投稿する</a>


        <ul>
            @foreach($optionsData as $optionData)
            <li>
                <span class="form_flex">

                 <a href="{{ route('admin.options.show', ['id' => $optionData->id]) }}" >{{$optionData->option_name}}</a>
                 <a href="{{ route('admin.options.edit', ['id' => $optionData->id]) }}" class="edit">[Edit]</a>

                     <form action="/admin/index_options/posts/{{$optionData->id}}" method="POST" class='form-inline'>
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
