@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger text-center">{{ $error }}</div>
                @endforeach
               <h2 style="text-align:center">投稿編集画面</h2>

                <div class="panel-body">
                    <form action="{{ route('update', $post->id) }}" method="post">
                        <!-- laravelでformを使用する場合は{{ csrf_field() }}を使う -->
                        {{ csrf_field() }}
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" name="title" value="{{ $post->title }}">
                            <label class="mdl-textfield__label">タイトル</label>
                        </div>

                        <br>

                        <div class="mdl-textfield mdl-js-textfield">
                        <textarea class="mdl-textfield__input" type="text" rows= "10" name="text">{{ $post->text }}</textarea>
                        <label class="mdl-textfield__label" for="sample5">本文を記入</label>
                        </div> 

                        <br>

                        <input type="submit" value="投稿を編集する" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                    </form>
                </div>
                <a href="{{ route('index') }}"  class="mdl-button mdl-js-button mdl-button--primary">投稿一覧に戻る</a>
            </div>
        </div>
    </div>
</div>
@endsection

</html>