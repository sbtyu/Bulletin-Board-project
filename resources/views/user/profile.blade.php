@extends('layouts.app')

@section('content')

@if (session('successMessage'))
<p class="alert alert-success text-center">{{ session('successMessage')}}</p>
@elseif (session('errorMessage'))
<p class="alert alert-danger text-center">{{ session('errorMessage')}}</p>
@endif

<div class="container">
    <div class="panel panel-default">
         <div class="panel-heading">
            <h2 style="text-align:center">{{$user->name}}さんのプロフィール</h2>

                <div style="text-align:right">
                @if ($session == $user->id)
                <h4>
                <a href="{{ route('user.editprofile', $user->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">プロフィールを編集する</a>
                </h4>
                @else
                @endif
            </div>
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

                    @if ($user->image == null)
					<td>
						<strong>未登録</strong>
					</td>

					@else
					<td>
						<img src="{{ $user->image }}">
					</td>
					@endif

                    <td>
                        {{ $user->email }}
                    </td>

                    @if ($user->comment == null)

					<td>
						<strong>未登録</strong>
					</td>

                    @else
                    <td>
                        {{ $user->comment }}
                    </td>
                    @endif

                </tr>

            </table>
            <a href="{{ route('index') }}"  class="mdl-button mdl-js-button mdl-button--primary">投稿一覧に戻る</a>
        </div>
    </div>
</div>
@endsection

</html>