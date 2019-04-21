@extends('layouts.default')

@section('title', 'Beyou')

@section('content')
<h1>
  <a href="/" class="header-menu">Beyou</a>
  文法を選んでください。
</h1>
    <div class = "container , text-center">
        <div class="row">
            @foreach($genres_data as $genre_data)
                <div class="col-sm-3">
                    <p>{{$genre_data->genre}}</p>
                    
                </div>
            @endforeach
        </div>
    </div>
@endsection
