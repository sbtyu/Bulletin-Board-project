<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//投稿一覧を表示させるルーティング
Route::get('/', 'PostController@index')->name('index');

Route::get('/newpost', 'PostController@newpost')->name('newpost');

Route::post('/add', 'PostController@add')->name('add');

Route::get('/editpost/{id}', 'PostController@editpost')->name('editpost');

Route::post('/update/{id}', 'PostController@update')->name('update');

Route::post('/remove/{id}', 'PostController@remove')->name('remove');