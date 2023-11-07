<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
        <title>Login Page</title>
    </head>
    <body>
        <div class="login-container">
            <h2>Login</h2>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <form class="login-form" method="post" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="text" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
            </form>
            <div class="back-button">
                <a href="{{ route('top') }}">戻る</a>
            </div>
        </div>
    </body>
</html>