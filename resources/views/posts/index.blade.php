@extends('layouts.login')

@section('content')
<section class="top-page">
  @foreach ($errors->all() as $error)
  <li>{{$error}}</li>
  @endforeach
  <!-- ↓二重波括弧内に url'posts' でも変わりないのか？ -->
  <form action="/posts" method="POST">
    @csrf
    <!-- 投稿の本文 -->
    <div class="post-form">
      <div class="avatar">
        @if(Auth::user()->images == 'dawn.png')
        <img src="{{ asset('images/icon1.png') }}" class="avatar">
        @else
        <img src="{{ asset('storage/avatar/'.Auth::user()->images) }}" class="avatar">
        @endif
      </div>
      <input class="post-content" type="text" name="post" placeholder="投稿内容を入力してください。">
      <div class="spacer"></div>
      <!--　登録ボタン -->
      <input class="postbutton-image" type="image" src="images/post.png" class="post-image">
    </div>
  </form>
</section>

<!-- 全ての投稿リスト -->
<div class="postList">
  @foreach ($posts as $post)
  <div class="aboutPost">
    <div class="post-users">
      @if($post->user->images == 'dawn.png')
      <img src="{{ asset('images/icon1.png') }}" class="avatar">
      @else
      <img src="{{ asset('storage/avatar/'.$post->user->images) }}" class="avatar">
      @endif
    </div>
    <div class="postList-content">
      <!-- 投稿更新日 -->
      <div class="postListdate">
        <p>{{ $post->updated_at }}</p>
      </div>
      <!-- 投稿者名の表示 -->
      <div class="postName">
        <p>{{ $post->user->username }}</p>
      </div>
      <!-- 投稿詳細 -->
      <div class="postListText">
        <p>{{ $post->post }}</p>
      </div>
    </div>
    <div class="spacer"></div>
    <!-- ↓投稿編集ボタンのための記述 -->
    @if (Auth::id() == $post->user_id)
    <div class="postListImage">
      <div class="postListEditImage">
        <a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png"></a>
      </div>
      <!-- ↓投稿削除ボタンのための記述 -->
      <div class="postListDeleteImage">
        <a class="postDelete" href="/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png"><img src="images/trash-h.png"></a>
      </div>
    </div>
    @endif
  </div>
  @endforeach

  <!-- ↓モーダルの中身（カリキュラムコピペ） -->
  <div class="modal js-modal">
    <!-- ↓背景暗くしてくれたりモーダル出現位置を真ん中にしてくれたり大事 -->
    <div class="modal__bg js-modal-close"></div>
    <div class="modal__content">
      <form action="/update" method="post">
        <textarea name="post" class="modal_post"></textarea>
        <input type="hidden" name="post_id" class="modal_id">
        <input type ="image" name="submit" width="30" height="30" src="images/edit.png" alt=" 送信">
        {{ csrf_field() }}
      </form>
      <a class="js-modal-close close-button" href="/top">閉じる</a>
    </div>
  </div>
  <!-- ↑モーダルの中身（カリキュラムコピペ） -->
</div>
@endsection
