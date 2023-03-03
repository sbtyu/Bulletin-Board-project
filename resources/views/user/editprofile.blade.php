@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center">{{ $error }}</div>
                @endforeach
               <h2 style="text-align:center">プロフィール情報編集画面</h2>

                <div class="panel-body">
                    <form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        <!-- laravelでformを使用する場合は{{ csrf_field() }}を使う -->
                        {{ csrf_field() }}
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="comment" value="{{ $user->comment }}">
                            <label class="mdl-textfield__label">一言コメント</label>
                        </div>

                        <br>
                        <br>
                        <br>

                        <p><strong>プロフィール画像をアップロードしてください</strong></p>
                        <input type="file" name="image">

                        <br>
                        <br>
                        <br>

                        <input type="submit" value="プロフィールを編集する" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    </form>
                </div>
                <a href="{{ route('index') }}"  class="mdl-button mdl-js-button mdl-button--primary">投稿一覧に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection

</html>