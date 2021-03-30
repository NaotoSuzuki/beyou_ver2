

@extends('layouts.admin',['authgroup'=>'admin'])

@section('title', 'Beyou')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">管理者 Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as 管理者!
                </div>
                <div class="card-body">
                    <!-- <a href="/admin/index_explanation">解説の投稿/編集/削除</a> -->
                    <a href="{{ route('admin.manage_questions') }}">[問題の投稿/編集/削除]</a><br>
                    <!-- <a href="/admin/index_explanation">解説の投稿/編集/削除</a> -->
                    <a href="{{ route('admin.index') }}">[解説の投稿/編集/削除]</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
