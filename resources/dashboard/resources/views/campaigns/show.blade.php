<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>キャンペーン</title>
    </head>
    <body>
        <div class="campaign-container">
            <h2>キャンペーン詳細</h2>

            <div class="campaign-info">
                <label>タイトル:</label>
                <p>{{ $campaign->title }}</p>

                <label>内容:</label>
                <p>{{ $campaign->explanation }}</p>

                <label>カテゴリー:</label>
                <p>{{ $campaign->category }}</p>

                <label>設定ポイント:</label>
                <p>{{ $campaign->point }}</p>

                <label>掲載開始日:</label>
                <p>{{ $campaign->activated }}</p>

                <label>掲載終了日:</label>
                <p>{{ $campaign->deactivated }}</p>

                <label>サムネイル:</label>
                <img src="{{ asset($campaign->thumbnail) }}">
            </div>

            <div class="button-container">
                <a href="{{ route('index.campaign') }}">戻る</a>
            </div>
        </div>
    </body>
</html>