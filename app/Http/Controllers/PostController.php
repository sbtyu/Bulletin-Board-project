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
    //
}
