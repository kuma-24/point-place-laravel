<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Create Account Page</title>
    </head>
    <body>
        <div class="register-container">
            <h2>アカウント登録</h2>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            <form class="register-form" method="post" action="{{ route('account.store') }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">first_name:</label>
                    <input type="text" name="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">last_name:</label>
                    <input type="text" name="last_name">
                </div>
                <div class="form-group">
                    <label for="first_name_kana">first_name_kana:</label>
                    <input type="text" name="first_name_kana">
                </div>
                <div class="form-group">
                    <label for="last_name_kana">last_name_kana:</label>
                    <input type="text" name="last_name_kana">
                </div>
                <div class="form-group">
                    <label for="birth_date">birth_date:</label>
                    <input type="date" name="birth_date">
                </div>
                <div class="form-group">
                    <button type="submit">Register</button>
                </div>
            </form>
            <div class="back-button">
                <a href="{{ route('account.show') }}">戻る</a>
            </div>
        </div>
    </body>
</html>