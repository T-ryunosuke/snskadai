<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    //auth認証
    //public function __construct(){
        //$this->middleware('auth');
    //}

    //↓初期から
    public function followList(){
        $user = Auth::user();
        $following = $user->following()->get();
        $following_id = $user->following()->pluck('followed_id');
        $posts = Post::with('user')->whereIn('user_id', $following_id)->get();
        return view('follows.followList', compact('following','posts'));
    }
    public function followerList(){
        $user = Auth::user();
        $followed = $user->followed()->get();
        $followed_id = $user->followed()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id', $followed_id)->get();
        return view('follows.followerList', compact('followed','posts'));
    }
    //↑

    //↓フォロー機能追加
    public function follow($id) {
        \DB::table('follows')->insert([
            'following_id' => \Auth::user()->id,
            'followed_id' => $id
        ]);
       // $followCount = count(FollowUser::where('followed_id', $id)->get());
        return back();
    }
    //↓フォロー解除機能追加
    public function unfollow($id) {
        $follow = Follow::where('following_id', \Auth::user()->id)->where('followed_id', $id)->delete();
        //$followCount = count(Follow::where('followed_id', $user->id)->get());
        return back();
    }

}
