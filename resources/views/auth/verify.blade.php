@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('メールアドレス認証してください。') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('新しい認証用リンクが送信されました。') }}
                        </div>
                    @endif

                    {{ __('先に進む前に、メールで送付された認証用リンクをご確認ください。') }}
                    {{ __('メールが届かない場合。') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('こちらで再送信してください。') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
