<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/accountShow.css') }}">
        <title>アカウント</title>
    </head>
    <body>
        <div class="profile-container">
            <h2>アカウント情報</h2>
            @if(!isset($user->userAccount))
                <div class="profile-info">
                    <label>メールアドレス:</label>
                    <p>{{ $user->email }}</p>
                </div>

                <div class="button-container">
                    <a href="{{ route('home') }}">戻る</a>
                    <a href="{{ route('edit.account') }}">編集</a>
                    <a href="{{ route('create.account') }}">追加登録</a>
                </div>
                
            @else
                <div class="profile-info">
                    <label>メールアドレス:</label>
                    <p>{{ $user->email }}</p>

                    <label>姓:</label>
                    <p>{{ $user->userAccount->first_name }}</p>

                    <label>姓カナ:</label>
                    <p>{{ $user->userAccount->first_name_kana }}</p>

                    <label>名:</label>
                    <p>{{ $user->userAccount->last_name }}</p>

                    <label>名カナ:</label>
                    <p>{{ $user->userAccount->last_name_kana }}</p>

                    <label>生年月日:</label>
                    <p>{{ $user->userAccount->birth_date }}</p>
                </div>

                <div class="button-container">
                    <a href="{{ route('home') }}">戻る</a>
                    <a href="{{ route('edit.account') }}">編集</a>
                </div>
            @endif
        </div>
    </body>
</html>