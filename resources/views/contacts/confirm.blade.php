@extends('layouts.contact')

@section('title', 'beyou')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <p>誤りがないことを確認のうえ送信ボタンをクリックしてください。</p>

                    <table class="table">
                        <tr>
                            <th>返信先メールアドレス</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>問い合わせ内容</th>
                            <td>{{ $contact->inquiry }}</td>
                        </tr>
                        <tr>

                    </table>

                    {!! Form::open(['url' => 'contact/complete',
                                    'class' => 'form-horizontal',
                                    'id' => 'post-input']) !!}

                    @foreach($contact->getAttributes() as $key => $value)
                        @if(isset($value))
                            @if(is_array($value))
                                @foreach($value as $subValue)
                                    <input name="{{ $key }}[]" type="hidden" value="{{ $subValue }}">
                                @endforeach
                            @else
                                {!! Form::hidden($key, $value) !!}
                            @endif

                        @endif
                    @endforeach

                    {!! Form::submit('戻る', ['name' => 'action', 'class' => 'btn']) !!}
                    {!! Form::submit('送信', ['name' => 'action', 'class' => 'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
