

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
      <a href="{{ url('/admin/index_explanation') }}" class="header-menu">Back</a>
      New Post
    </h1>

    <form method="post" action="{{ url('/admin/index_explanation/posts') }}">
      {{ csrf_field() }}

        文法コード：<input type="text" name = genre_code placeholder="genre_valueと同じ">
        <br><br>
        解説タイトル：<input type='text' name = "title" placeholder="解説タイトル">
          <br><br>



          <p>
            <textarea name="content" placeholder="文法説明">{{ old('content') }}</textarea>
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
