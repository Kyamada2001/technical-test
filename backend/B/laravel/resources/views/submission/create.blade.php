@extends('layouts.app')
@section('title', '投稿')

@section('content')
<form action="/submission/store" method="POST">
    @csrf
    @if(session('message'))
        {{ session('message') }}
    @endif
    <div class="form-group">
        <div>
            <label>投稿内容</label>
            <textarea class="form-control" name="text">{{ old('text') }}</textarea>
            @error('text')
                {{ $message }}
            @enderror
        </div>
        <button>送信</button>
    </div>
</form>
@endsection