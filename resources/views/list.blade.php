<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset='utf-8'>
    <title>参加者一覧</title>
</head>
<body>
    <p>
        <table>
            <thead>
                <tr>
                    <th>参加者名</th>
                    <th>備考</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->memo}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </p>
    <p>
        <form name="registform" action="/register" method="post" id="registform">
            @csrf
            <dl>
                <dt>参加者名：</dt>
                <dd>
                    <input type="text" name="name">
                    <span>{{ $errors->first('name') }}</span>
                </dd>
            </dl>
            <dl>
                <dt>備考：</dt>
                <dd>
                    <input type="text" name="memo">
                    <span>{{ $errors->first('memo') }}</span>
                </dd>
            </dl>
            <button type="submit" name="action" value="send">登録</button>
        </form>
    </p>
</body>
</html>
