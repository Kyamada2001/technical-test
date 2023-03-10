<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB投稿</title>
</head>
<body>
    @if(!empty(Auth::guard('user')->user()))
        <div>{{ Auth::guard('user')->user()->name }}さんログイン中</div>

        <div>
            <h1>メニュー</h1>
            <a href="{{ route('submission.index') }}">投稿一覧</a>
            <a href="{{ route('submission.create') }}">投稿作成</a>
        </div>
    @else
        <div>
            <h1>メニュー</h1>
            <a href="{{ route('submission.index') }}">投稿一覧</a>
            <a href="{{ route('user.login') }}">ログイン</a>
            <a href="{{ route('user.create') }}">ユーザー登録</a>    
        </div>
    @endif
    <div class="container">
        <div>
            <h1>@yield('title')</h1>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
    @yield('script')
</body>
</html>