@extends('layouts.app')

@section('content')


<div class="container">
    <div class="panel panel-default">
         <div class="panel-heading">
            <h2 style="text-align:center">投稿一覧</h2>
            @if (!$session)
            <h5 style="text-align:right">
            <a href="{{ route('login')}}">新規投稿するにはログインしてください</a>
            </h5>
            @endif
        </div>

        <div class="panel-body">

            <table class="table table-striped">

                <tr>
                    <th>投稿ID</th>
                    <th>投稿者名</th>
                    <th>タイトル</th>
                    <th>本文</th>
                    <th>投稿日時</th>
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

                </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>
@endsection

</html>