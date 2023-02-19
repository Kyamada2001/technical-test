@extends('layouts.app')
@section('title', 'ログイン')

@section('content')
<form action="/user/login" method="POST">
    @csrf
    @if(session('message'))
        {{ session('message') }}
    @endif
    <div class="form-group">
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
            <button class="btn btn-primary">送信</button>
        </div>
    </div>
</form>
@endsection