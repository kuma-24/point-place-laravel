<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}">
        <title>管理者新規登録</title>
    </head>
    <body>
        <div class="signup-container">
            <div class="signup-form">
                <h2>管理者 新規登録</h2>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <form id="signup-form" method="post" action="{{ route('register') }}">
                    @csrf
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email">

                    <label for="first_name">名前（姓）:</label>
                    <input type="text" id="first_name" name="first_name">

                    <label for="last_name">名前（名）:</label>
                    <input type="text" id="last_name" name="last_name">

                    <label for="first_name_kana">名前（姓カナ）:</label>
                    <input type="text" id="first_name_kana" name="first_name_kana">

                    <label for="last_name_kana">名前（名カナ）:</label>
                    <input type="text" id="last_name_kana" name="last_name_kana">

                    <label for="birth_date">生年月日:</label>
                    <input type="date" id="birth_date" name="birth_date">

                    <label for="password">パスワード:</label>
                    <input type="password" id="password" name="password">

                    <label for="password">パスワード:</label>
                    <input type="password" name="password_confirmation" placeholder="もう一度入力">

                    <button type="submit">新規登録</button>
                </form>
                <p>すでにアカウントをお持ちの方は <a href="{{ route('top') }}">戻る</a></p>
            </div>
        </div>
    </body>
</html>