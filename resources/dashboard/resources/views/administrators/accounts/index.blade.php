<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/accountIndex.css') }}">
        <title>アカウント一覧</title>
    </head>
    <body>
        <div class="account-list-container">
            <h2>アカウント一覧</h2>
            <ul class="account-list">
                @foreach($administrators as $administrator)
                    <li class="account-item">
                        <span>{{ $administrator->administratorAccount->first_name . $administrator->administratorAccount->last_name }}</span>
                        <a href="{{ route('show.account', $administrator->id) }}">詳細</a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('home') }}">戻る</a>
        </div>
    </body>
</html>
