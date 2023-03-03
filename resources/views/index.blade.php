@extends('layouts.app')

@section('content')

<script>
function select() {
		var select = confirm("本当に削除しますか？");
		if (!select) {
				alert('キャンセルしました');
				return select;
		}
}
</script>

@if (session('successMessage'))
<p class="alert alert-success text-center">{{ session('successMessage')}}</p>
@elseif (session('errorMessage'))
<p class="alert alert-danger text-center">{{ session('errorMessage')}}</p>
@endif

<div class="container">
    <div class="panel panel-default">
         <div class="panel-heading">
            <h2 style="text-align:center">投稿一覧</h2>

            <div style="text-align:right">
                @if (!$session)
                <h5>
                <a href="{{ route('login')}}">新規投稿するにはログインしてください</a>
                </h5>
                @else                 
                <h4>
                <a href="{{ route('newpost') }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">新規投稿する</a>
                </h4>
                @endif
            </div>
        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <tr>
                    <th>投稿ID</th>
                    <th>投稿者名</th>
                    <th>タイトル</th>
                    <th>本文</th>
                    <th>投稿日時</th>
                    <th>更新日時</th>
                    <th>編集</th>
                    <th>削除</th>
                </tr>

                @if (!$post)
                <tr>投稿はありません</tr>
                @else
                @foreach ($post as $posts)
                <tr>

                    <td>
                        {{ $posts->id }}
                    </td>

                    <td>
                        {{ $posts->user->name }}
                    </td>

                    <td>
                        {{ $posts->title }}
                    </td>

                    <td>
                        {{ $posts->text }}
                    </td>

                    <td>
                        {{ $posts->created_at }}
                    </td>

                    <td>
                        {{ $posts->updated_at }}
                    </td>

                    @if ($session == $posts->user_id )
                    
                    <td class="text-left">
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="location.href='{{ route('editpost', $posts->id) }}'">編集</button>
                    </td>

                    <td class="text-left">
                    <form class="form-horizontal" method="POST" action="{{ route('remove', $posts->id) }}">
                    {{ csrf_field() }}
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" onclick="return select()" type="submit">削除</button>
                    </form>
                    </td>

                    @else
                    @endif

                </tr>
                @endforeach
                @endif

            </table>
        </div>
    </div>
</div>
@endsection

</html>