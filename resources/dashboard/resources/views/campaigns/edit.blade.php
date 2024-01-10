<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>キャンペーン編集</title>
    </head>
    <body>
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

        <form method="post" enctype="multipart/form-data" action="{{ route('update.campaign', $campaign) }}">
            @csrf
            @method('PATCH')

            <dl class="form-list">
                <dt>タイトル</dt>
                <dd><input type="text" name="title" value="{{ $campaign->title }}"></dd>
                <dt>内容</dt>
                <dd><input type="text" name="explanation" value="{{ $campaign->explanation }}"></dd>
                <dt>カテゴリー</dt>
                <dd>
                    <select name="category">
                        <option value="0">選択してください</option>
                        <option value="1">バナー</option>
                        <option value="2">イベント</option>
                    </select>
                </dd>
                <dt>設定ポイント</dt>
                <dd><input type="number" min="1" name="point" value="{{ $campaign->point }}"></dd>
                <dt>掲載開始日</dt>
                <dd><input type="date" name="activated" value="{{ date('Y-m-d', strtotime($campaign->activated)) }}"></dd>
                <dt>掲載終了日</dt>
                <dd><input type="date" name="deactivated" value="{{ date('Y-m-d', strtotime($campaign->deactivated)) }}"></dd>
                <dt>サムネイル</dt>
                <dd><input type="file" name="thumbnail"></dd>
            </dl>

            <div class="button-container">
                <button type="submit">保存</button>
                <a href="{{ route('index.campaign') }}">戻る</a>
            </div>
        </form>
    </body>
</html>