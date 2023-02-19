@extends('layouts.app')
@section('title', '投稿一覧')

@section('content')
    @if (session('message'))
        <div>{{ session('message') }}</div>
    @endif
    <div>
        全{{ count($submissions) ?? 0 }}件
    </div>
    <div>
        @forelse($submissions as $submission)
        <div>
            <p>{{ $submission->text }}</p>
        </div>
        @empty
        <p>投稿がありません。</p>
        @endforelse
    </div>
@endsection