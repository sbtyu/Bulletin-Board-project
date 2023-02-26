@extends('layouts.app')

@section('content')

@if (session('successMessage'))
<p class="alert alert-success text-center">{{ session('successMessage')}}</p>
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
                    <th>編集・削除</th>
                </tr>

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

                
                    <td>

                    @if ($session == $posts->user_id )
                    
                    <a href="{{ route('editpost', $posts->id) }}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">編集</a>

                    @else
                    @endif

                    </td>

                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection

</html>