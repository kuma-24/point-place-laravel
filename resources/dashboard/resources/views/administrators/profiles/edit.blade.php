<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/profileEdit.css') }}">
        <title>プロファイル編集</title>
    </head>
    <body>
        <div class="edit-container">
            <h2>プロファイル編集</h2>

            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <form class="edit-form" method="post" action="{{ route('update.profile') }}">
                @csrf 
                @method('PATCH')

                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" value="{{ $administrator->email }}">

                <label for="lastName">姓:</label>
                <input type="text" id="lastName" name="last_name" value="{{ $administrator->administratorAccount->first_name }}">

                <label for="lastKana">姓カナ:</label>
                <input type="text" id="lastKana" name="last_name_kana" value="{{ $administrator->administratorAccount->first_name_kana }}">

                <label for="firstName">名:</label>
                <input type="text" id="firstName" name="first_name" value="{{ $administrator->administratorAccount->last_name }}">

                <label for="firstKana">名カナ:</label>
                <input type="text" id="firstKana" name="first_name_kana" value="{{ $administrator->administratorAccount->last_name_kana }}">

                <label for="birthdate">生年月日:</label>
                <input type="date" id="birthdate" name="birth_date" value="{{ $administrator->administratorAccount->birth_date }}">

                <div class="button-container">
                    <button type="submit">保存</button>
                    <a href="{{ route('show.profile') }}">戻る</a>
                </div>
            </form>
        </div>
    </body>
</html>