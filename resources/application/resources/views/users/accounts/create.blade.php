<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/accountCreate.css') }}">
        <title>追加登録</title>
    </head>
    <body>
        <div class="create-container">
            <h2>アカウント追加登録</h2>
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <form class="create-form" method="post" action="{{ route('store.account') }}">
                @csrf
                
                <label for="firstName">名:</label>
                <input type="text" id="firstName" name="first_name">

                <label for="firstKana">名カナ:</label>
                <input type="text" id="firstKana" name="first_name_kana">

                <label for="lastName">姓:</label>
                <input type="text" id="lastName" name="last_name">

                <label for="lastKana">姓カナ:</label>
                <input type="text" id="lastKana" name="last_name_kana">

                <label for="birthdate">生年月日:</label>
                <input type="date" id="birthdate" name="birth_date">

                <div class="button-container">
                    <button type="submit">保存</button>
                    <a href="{{ route('show.account') }}">戻る</a>
                </div>
            </form>
        </div>
    </body>
</html>