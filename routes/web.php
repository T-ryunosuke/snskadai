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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();



//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function () {
  //↑ログインしていないと入れないURLに入れないようにする。
  Route::get('/top','PostsController@index');
  //プロフィール
  Route::get('/profile','UsersController@profile');
  Route::post('/up-profile','UsersController@update');
  //ユーザープロフィール
  Route::get('/{id}/user_profile','UsersController@userProfile');
  //検索
  Route::get('/search','UsersController@search');
  Route::post('/search','UsersController@search');
  Route::get('/{id}/follow','FollowsController@follow');
  Route::get('/{id}/unfollow','FollowsController@unfollow');
  //フォロー
  Route::get('/follow-list','FollowsController@followList');
  //フォロワー
  Route::get('/follower-list','FollowsController@followerList');
  // 投稿処理
  Route::post('/posts', 'PostsController@store');
  // 投稿編集
  Route::post('/update', 'PostsController@update');
  // 投稿削除
  Route::get('/{id}/delete', 'PostsController@delete');

    //ログアウト機能
  Route::get('/logout', 'Auth\LoginController@logout');
  });
