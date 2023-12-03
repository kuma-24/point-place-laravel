<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/accountEdit.css') }}">
        <title>アカウント編集</title>
    </head>
    <body>
        <div class="edit-container">
            <h2>アカウント編集</h2>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <form class="edit-form" method="post" action="{{ route('update.account') }}">
                @csrf 
                @method('PATCH')

                @if(!isset($user->userAccount))
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}">
                @else
                    <label for="email">メールアドレス:</label>
                    <input type="email" id="email" name="email" value="{{ $user->email }}">

                    <label for="lastName">姓:</label>
                    <input type="text" id="lastName" name="last_name" value="{{ $user->userAccount->first_name }}">

                    <label for="lastKana">姓カナ:</label>
                    <input type="text" id="lastKana" name="last_name_kana" value="{{ $user->userAccount->first_name_kana }}">

                    <label for="firstName">名:</label>
                    <input type="text" id="firstName" name="first_name" value="{{ $user->userAccount->last_name }}">

                    <label for="firstKana">名カナ:</label>
                    <input type="text" id="firstKana" name="first_name_kana" value="{{ $user->userAccount->last_name_kana }}">

                    <label for="birthdate">生年月日:</label>
                    <input type="date" id="birthdate" name="birth_date" value="{{ $user->userAccount->birth_date }}">
                @endif

                <div class="button-container">
                    <button type="submit">保存</button>
                    <a href="{{ route('show.account') }}">戻る</a>
                </div>
            </form>
        </div>
    </body>
</html>