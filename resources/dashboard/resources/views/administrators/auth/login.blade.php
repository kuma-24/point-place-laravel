<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <title>管理者ログイン</title>
    </head>
    <body>
        <div class="login-container">
            <div class="login-form">
                <h2>管理者 ログイン</h2>
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <form id="login-form" method="post" action="{{ route('login') }}">
                    @csrf
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email">

                    <label for="password">パスワード:</label>
                    <input type="password" id="password" name="password">

                    <button type="submit">ログイン</button>
                </form>
                <p>アカウントをお持ちでない方は <a href="{{ route('top') }}">戻る</a></p>
            </div>
        </div>
    </body>
</html>