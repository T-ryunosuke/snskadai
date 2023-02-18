<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //↓投稿機能追加記述 post.phpと連携
    public function posts() { //1対多の「多」側なので複数形
      return $this->hasMany('App\Post');
    }


    //↓フォロー機能実装のため
    public function following()
    {
      return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

    public function followed()
    {
      return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
    //↑※'App\User'をUser::classと記述してる所もある
    //第一引数には使用するモデル
    //第二引数には使用するテーブル名
    //第三引数にはリレーションを定義しているモデルの外部キー名
    //第四引数には結合するモデルの外部キー名

    //public function followIds(){
      //ユーザがフォロー中のユーザを取得
      //$followIds = $this->followed()->pluck('follows.following_id')->toArray();
      //フォロー中のユーザを返す
      //return $followIds;
    //}


    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (boolean) $this->following()->where('followed_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (boolean) $this->followed()->where('following_id', $user_id)->first();
    }

}
