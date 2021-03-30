@extends('layouts.contact')

@section('title', 'beyou')

@section('content')


<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                {{-- エラーの表示 --}}

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(['url' => 'contact/confirm',
                            'class' => 'form-horizontal']) !!}

                <div class="form-group{{ $errors->has('device') ? ' has-error' : '' }}">
                    {!! Form::label('email', '返信先メールアドレス', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('email', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('email'))
                            <span class="help-block">
                                 <strong> {{ $errors->first('email') }} </strong>
                            </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('note') ? ' has-error' : '' }}">
                    {!! Form::label('inquiry', 'お問い合わせ内容:', ['class' => 'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">

                        {!! Form::textarea('inquiry', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('inquiry'))
                            <span class="help-block">
                        <strong>{{ $errors->first('inquiry') }}</strong>
                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {!! Form::submit('確認', ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>


@endsection
