<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Postモデルをこのコントローラーで使うための記述
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //ユーザー情報表示
    public function showProfile(int $id)
    {
        $user = User::find($id);

        $session = Auth::id();

        return view('user.profile', compact('user', 'session'));
    }

    //ユーザー情報編集画面表示
    public function editprofile(int $id)
    {
        $user = User::find($id);

        $session = Auth::id();

        if ($user->id !== $session) {
            return redirect(route('index'))->with('errorMessage', '不正なアクセスです');
        }

        return view('user.editprofile', compact('user'));
    }

    //ユーザー情報編集処理
    public function update(Request $request, int $id)
    {

        $request->validate([
			'comment' => 'nullable',
			'image' => 'nullable | file | mimes:jpeg,png,jpg',
		]);

        $user = User::find($id);

        if ($request->input('comment')) {
            $comment = $request->input('comment');
        } else {
            $comment = null;
        }

        if ($request->file('image')) {

			// アップロードされたファイル名を取得
			$file = $request->file('image');
            
            $path = Storage::disk('s3')->putFile('/', $file, 'public');

            $url = Storage::disk('s3')->url($path);

		} else {
            if ($user->image){
                $url = $user->image;
            } else {
                $url = null;
            }
		}

        User::where('id', '=', $id)->update([
            'comment' => $comment,
            'image' => $url,
		]);

         return redirect(route('user.profile', ['id' => $id]))->with('successMessage', 'プロフィールを編集しました');
    }
}
