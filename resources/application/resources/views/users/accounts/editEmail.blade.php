<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Email Page</title>
    </head>

    <body>
        <div class="register-container">
            <h2>メールアドレス編集</h2>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

            <form class="register-form" method="post" action="{{ route('account_email.update') }}">
                @csrf
                @method('PATCH')

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" value="{{ $accounts['email'] }}">
                </div>

                <div class="form-group">
                    <button type="submit">update</button>
                </div>
            </form>

            <div class="back-button">
                <a href="{{ route('account.show') }}">戻る</a>
            </div>
        </div>
    </body>
</html>