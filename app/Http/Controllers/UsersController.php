<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Auth;

class UsersController extends Controller
{
    //auth認証（恐らく今後）
    //public function __construct(){
      //$this->middleware('auth');
    //}

    //プロフィール
    public function profile(){
      $user=Auth::User();
      return view('users.profile',['user' => $user]);
    }
    //↓プロフィール編集
    public function update(Request $request){
      $images = $request->images;
      $dir = 'avatar';
      if(!empty($images)){
        $file_name=$request->images->getClientOriginalName();
        $images=$request->images->storeAs('public/' . $dir,$file_name);
      }else{
        $images = Auth::user()->images;
      }
      $data = $request->input();
      $id = Auth::id();
      User::where('id', $id)
      ->update(
        ['username' => $data['username'],
        'mail' => $data['mail'],
        'password' => bcrypt($data['password']),//←bcryptで暗号化
        'bio' => $data['bio'],
        'images' => basename($images)//←basenameでパスの最後にある名前の部分を返す
        ]);
      return redirect('/top');
    }
    //↑

    //↓ユーザープロフィール
    public function userProfile($id){
      $profile = Post::where('user_id', $id)->first();
      $posts = Post::where('user_id', $id)->get();
      return view('users.user_profile', compact('posts', 'profile'));
    }
    //↑

    public function search(Request $request){
      $search_name = $request->search;
      //↓POST送信かの判別
      if($request->isMethod('post')){
        if(!empty($search_name)){//←空じゃないか判別
          $query = User::query();//←queryを挟む必要があるのか？？
          $users = $query->where('username','like',"%{$search_name}%")->get();
          return view('users.search')->with([
            'users'=>$users,
            'search_name'=>$search_name
          ]);
        }
      }
      //↓GET送信だった時
      $users = User::all();
      return view('users.search',['users' => $users]);
    }

}
