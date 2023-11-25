<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/top.css') }}">
        <title>管理者 トップ画面</title>
    </head>
    <body>
        <div class="container">
            <div class="form-container">
                <p><a href="{{ route('register') }}">signUp</a></p>
            </div>
            <div class="form-container" id="signup-form">
                <p><a href="{{ route('login') }}">signIn</a></p>
            </div>
        </div>
    </body>
</html>
