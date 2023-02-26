<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Postモデルをこのコントローラーで使うための記述
use App\Post;

use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        //postsテーブルから全てのカラムを取得
        $post = Post::with('user')->get();

        //現在認証されているユーザを取得
        // Auth::user()->idと同様
        $session = Auth::id();

        //indexビューに値を渡す
        return view('index', compact('post', 'session'));
    }

    public function newpost()
    {
        return view('newpost');
    }

    public function add(Request $request)
    {
        //ログインユーザのidを取得
        $user_id = Auth::id();

        //POST値のバリデーション実施
		//required:入力必須項目
		$request->validate([
			'title' => 'required',
			'text' => 'required',
		]);

        //フォームで送られてきた値を取得
        $title = $request->input('title');
        $text = $request->input('text');

        $post = new Post();

        $post->create([
            'user_id' => $user_id,
            'title' => $title,
            'text' => $text,
        ]);

        return redirect(route('index'))->with('successMessage', '投稿を追加しました');
    }

    public function editpost(int $id)
    {
        //編集したい投稿の投稿IDを取得
        $post = Post::find($id);

        //現在ログイン中のユーザIDを取得
        $user_id = Auth::id();

        //他のユーザーの投稿を編集できないようにリダイレクト
        if ($post->user_id != $user_id){
            return redirect(route('index'));
        }

        return view('editpost', compact('post'));
    }

    public function update(Request $request, int $id) 
    {
        //POST値のバリデーション実施
		//required:入力必須項目
		$request->validate([
			'title' => 'required',
			'text' => 'required',
		]);

        $user_id = Auth::id();

        //フォームで送られてきた値を取得
        $title = $request->input('title');
        $text = $request->input('text');

        Post::where('id', '=', $id)->update([
            'user_id' => $user_id,
            'title' => $title,
            'text' => $text,
		]);

        return redirect(route('index'))->with('successMessage', '投稿を編集しました');

    }
}
