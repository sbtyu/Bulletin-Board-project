<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Postモデルをこのコントローラーで使うための記述
use App\User;

use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function showProfile(int $id)
    {
        $user = User::find($id);

        $session = Auth::id();

        return view('user.profile', compact('user', 'session'));
    }
}
