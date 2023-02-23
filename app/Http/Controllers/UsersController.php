<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use App\Post;
use App\Follow;
use Auth;

class UsersController extends Controller
{

protected function validator(array $data)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'mail' => ['required','string','email:filter,dns','max:255',Rule::unique('users')->ignore(Auth::id())],
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required',
            'bio' => 'string|max:400',
            'images' => 'string|max:255'
        ];

        $messages =[
            "required" => "必須項目です",
            "email" => "メールアドレスの形式で入力してください",
            "string" => "文字で入力してください",
            "max" => "255文字以内で入力してください",
            "bio.max" => "400文字以内で入力してください",
            "unique" => "登録済みのメールアドレスは無効です",
            "confirmed" => "パスワード確認が一致しません",
        ];

        return Validator::make($data, $rules, $messages);
    }

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
      $errors = $this->validator($data);
      if($errors->fails()){
        return redirect('/profile')
        ->withErrors($errors)
        ->withInput();
      }
      $id = $request->id;
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
      $posts = Post::where('user_id', $id)->get();
      $profile = User::where('id', $id)->get();
      return view('users.user_profile', compact('posts', 'profile'));
    }
    //↑

    public function search(Request $request){
      $search_name = $request->search;
      //↓POST送信かの判別
      if($request->isMethod('post')){
          //$query = User::query();←queryを挟む必要があるのか？？
          $users = User::where('username','like',"%{$search_name}%")->get();
          return view('users.search')->with([
            'users'=>$users,
            'search_name'=>$search_name
          ]);
      }
      //↓GET送信だった時
      $users = User::all();
      return view('users.search',['users' => $users]);
    }

}
