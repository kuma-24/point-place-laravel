<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Show Account Page</title>
    </head>
    <body>
        @if (!$accounts['user_account'])
            <p>e-mail: {{  $accounts['email'] }}</p>
            <a href="{{ route('email.edit') }}">メールアドレス編集</a>
            <a href="{{ route('account.create') }}">アカウント追加登録</a>
        @else
            <p>e-mail: {{ $accounts['email'] }}</p>
            <a href="{{ route('account_email.edit') }}">メールアドレス編集</a>
            
            <p>first-Name: {{ $accounts['user_account']['first_name'] }}</p>
            <p>first-Name-kana: {{ $accounts['user_account']['first_name_kana'] }}</p>
            <p>last-Name: {{ $accounts['user_account']['last_name'] }}</p>
            <p>last-Name-kana: {{ $accounts['user_account']['last_name_kana'] }}</p>
            <p>birth-date: {{ $accounts['user_account']['birth_date'] }}</p>
            <a href="{{ route('account.edit') }}">アカウント編集</a>
        @endif

        <a href="{{ route('home') }}">戻る</a>
    </body>
</html>