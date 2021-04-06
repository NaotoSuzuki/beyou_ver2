

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
    </h1>


    <form method="post" action="{{ url('/admin/index_explanation/posts/update', $post->id)}}">
        @csrf
        @method('PATCH')

          <input type="text" name="genre_code" value="" placeholder="genre_code">

          <p>
            <input type="text" name="title" placeholder="enter title" value="{{ old('title, $post->title)') }}">
            @if ($errors->has('title'))
                <span class="error">{{ $errors->first('title') }}</span>
            @endif
          </p>

          <p>
            <textarea name="content" placeholder="enter body">{{ old('content', $post->content) }}</textarea>
            @if ($errors->has('content'))
                <span class="error">{{ $errors->first('content') }}</span>
            @endif
          </p>


          <p>
            <input type="submit" value="Update">
          </p>

    </form>


</div>

@endsection
