<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <title>Home</title>
    </head>
    <body>
        <form method="post" action="{{ route('logout') }}">
            @csrf 
            <button type="submit">Logout</button>
        </form>
        <a href="{{ route('index.account') }}">アカウント一覧</a>
        <a href="{{ route('index.campaign') }}">キャンペーン一覧</a>
        <a href="{{ route('show.profile') }}">myProfile</a>
    </body>
</html>