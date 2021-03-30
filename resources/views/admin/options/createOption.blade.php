

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
      New Post
    </h1>

    <form method="post" action="{{ url('/admin/index_options/posts') }}">
      {{ csrf_field() }}

        文法名：<select name="genre_value">
           <option value="beverb">Be動詞</option>
           <option value="verb">動詞</option>
        </select>

        <br>
          オプション番号:
          <select name="option_num">
           <option value="1" selected>1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
          </select>
          <br>

          <input type='text' name = "option_name" placeholder="オプション名(文法名+オプション番号)">
          <br><br>

          <input type='text' name = "option_detail" placeholder="オプションの簡単な解説(一行分程度)"><br><br>

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
          <p>
            <input type="submit" value="Add">
          </p>
    </form>

</div>

@endsection
