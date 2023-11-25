<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
        <title>管理者プロファイル</title>
    </head>
    <body>
        <div class="profile-container">
            <h2>プロファイル情報</h2>

            <div class="profile-info">
                <label>メールアドレス:</label>
                <p>{{ $administrator->email }}</p>

                <label>姓:</label>
                <p>{{ $administrator->administratorAccount->first_name }}</p>

                <label>姓カナ:</label>
                <p>{{ $administrator->administratorAccount->first_name_kana }}</p>

                <label>名:</label>
                <p>{{ $administrator->administratorAccount->last_name }}</p>

                <label>名カナ:</label>
                <p>{{ $administrator->administratorAccount->last_name_kana }}</p>

                <label>生年月日:</label>
                <p>{{ $administrator->administratorAccount->birth_date }}</p>
            </div>

            <div class="button-container">
                <a href="{{ route('index.account') }}">戻る</a>
            </div>
        </div>
    </body>
</html>