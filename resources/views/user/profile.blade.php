@extends('layouts.app')

@section('content')
<div class="container">
    <div class="panel panel-default">
         <div class="panel-heading">
            <h2 style="text-align:center">プロフィール</h2>
        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <tr>
                    <th>ユーザー名</th>
                    <th>プロフィール画像</th>
                    <th>メールアドレス</th>
                    <th>一言コメント</th>
                </tr>

                <tr>

                    <td>
                        {{ $user->name }}
                    </td>

                    <td>
                        {{ $user->image }}
                    </td>

                    <td>
                        {{ $user->email }}
                    </td>

                    <td>
                        {{ $user->comment }}
                    </td>

                </tr>

            </table>
            <a href="{{ route('index') }}"  class="mdl-button mdl-js-button mdl-button--primary">投稿一覧に戻る</a>
        </div>
    </div>
</div>
@endsection

</html>