@extends('layouts.app')
@section('title', 'ユーザー登録')

@section('content')
<form action="/user/store" method="POST">
    @csrf
    @if(session('message'))
        {{ session('message') }}
    @endif
    <div class="form-group">
        <div>
            <label>ユーザー名</label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}"/>
            @error('name')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label>メールアドレス</label>
            <input class="form-control" type="email" name="email" value="{{ old('email') }}"/>
            @error('email')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label>パスワード</label>
            <input type="text" name="password" value="{{ old('password') }}"/>
            @error('password')
                {{ $message }}
            @enderror
        </div>
        <div>
            <label>パスワード(確認)</label>
            <input type="password" name="password_confirmation"/>
            @error('password_confirmation')
                {{ $message }}
            @enderror
        </div>
        <div>
            <button class="btn btn-primary">送信</button>
        </div>
    </div>
</form>
@endsection