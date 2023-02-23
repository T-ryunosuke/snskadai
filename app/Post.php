<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //↓試し
    //protected $fillable = ['user_id', 'post'];

    //↓投稿機能追加記述 user.phpと連携
    public function user() { //1対多の「１」側なので単数系
      return $this->belongsTo('App\User');
    }
}
