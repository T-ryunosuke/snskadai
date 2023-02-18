<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //↓フォロー機能追加のため
    protected $fillable = ['following_id', 'followed_id'];

    protected $table = 'follows';//←中間テーブル（多対多）を利用する際にModelとテーブル名が異なるとき使用。FollowかFollowsか。
    //↑
}
