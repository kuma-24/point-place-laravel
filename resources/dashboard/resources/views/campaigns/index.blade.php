<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>キャンペーン一覧</title>
    </head>
    <body>
        <div>
            <h2>キャンペーン一覧</h2>

            @foreach ($campaigns as $campaign)
                <li>{{ $campaign->title }}</li>
                <a href="{{ route('show.campaign', $campaign->id) }}">詳細</a>
                @if ($campaign->administrator_id === auth()->user()->id)
                    <a href="{{ route('edit.campaign', $campaign) }}">編集</a>
                    <form action="{{ route('delete.campaign', $campaign) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">削除</button>
                    </form>
                @endif
            @endforeach

            <div>
                <a href="{{ route('create.campaign') }}">作成</a>
                <a href="{{ route('home') }}">戻る</a>
            </div>
        </div>
    </body>
</html>