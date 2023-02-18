<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Follow;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $id = Auth::id();
        $following_id = $user->following()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->orwhere('user_id', $id)->get();
        return view('posts.index', compact('posts'));
    }

    public function store(Request $request){
    //以下に登録処理を記述（Eloquentモデル）
      $posts = new Post;
      $posts->post = $request->post;
      $posts->user_id = Auth::id();//ここでログインしているユーザidを登録
      $posts->save();

      return redirect('/top');
    }

    //↓投稿削除機能
    public function delete($id){
      Post::where('id', $id)
        ->delete();
      return redirect('/top');
    }

    //↓投稿編集機能
    //public function edit($id)
    //{
      //\DB::table('posts')
       //->where('id', $id)
       //->update(
        //['post' => $post]
       //);
      //return redirect('/top');
    //}

    public function update(Request $request){
      $post = $request->post;
      $id = $request->post_id;
      Post::where('id', $id)
        ->update(
        ['post' => $post]
        );
      return redirect('/top');
    }

    public function show(){
      // フォローしているユーザーのidを取得
      $following_id = Auth::user()->following()->pluck('following_id');
      // フォローしているユーザーのidを元に投稿内容を取得
      $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
      return view('follows.followList', compact('posts'));
    }

}
