

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')

<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbima",
    });
</script>

<div class="container , text-center , basic_color">

    <h1>
      <a href="{{ url('/admin/manage_options') }}" class="header-menu">Back</a>
    </h1>


    <form method="post" action="{{ url('/admin/index_options/posts/update', $option->id)}}">
        @csrf
        @method('PATCH')
        @php
         $id = $option->id;
        @endphp
        文法コード：<input type = 'text' name= 'genre_value' value="{{$option->genre_value}}" placeholder="{{$option->genre_value}}">

        <br>
          オプション番号：<input type = 'text' name= 'option_num' value="{{$option->option_num}}" placeholder="{{$option->option_num}}">
          <br>

          オプション名:<input type='text' name = "option_name" value="{{$option->option_name}}" placeholder="{{$option->option_name}}">
          <br><br>

          オプション簡易説明:<input type='text' name = "option_detail" value="{{$option->option_detail}}" placeholder="{{$option->option_detail}}">
          <br>
          <br>
          <p>
            <input type="text" name="option_describe_title" placeholder="オプション説明タイトル" value="{{ old('title') }}">
            @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif
          </p>

          <p>
            <textarea name="option_describe_content" placeholder="オプション説明内容">{{ old('content') }}</textarea>
            @if ($errors->has('content'))
                <span class="error">{{ $errors->first('content') }}</span>
            @endif
          </p>
          <input type="hidden" name = "id" value="{{$id}}">
          <p>
            <input type="submit" value="Update">
          </p>

    </form>


</div>

@endsection
