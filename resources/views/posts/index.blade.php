@extends('layouts.login')

@section('content')
<div class="top-page">
  <!-- ↓二重波括弧内に url'posts' でも変わりないのか？ -->
  <form action="/posts" method="POST">
  @csrf
    <!-- 投稿の本文 -->
    <section class="post-text">
      <input type="text" name="post" placeholder="投稿内容を入力してください。">
      <!--　登録ボタン -->
      <input type="image" src="images/post.png" class="post-image">
    </section>
  </form>
</div>

<!-- 全ての投稿リスト -->
<div class="postList">
  @foreach ($posts as $post)
  <div class="aboutPost">
    <img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;">
    <!-- 投稿者名の表示 -->
    <div class="postName">
      <p>{{ $post->user->username }}</p>
    </div>
    <!-- 投稿詳細 -->
    <div class="postListText">
      <p>{{ $post->post }}</p>
    </div>
    <div class="postListImage">
      <!-- ↓投稿編集ボタンのための記述 -->
      <div class="postListEditImage">
        <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png"></a>
      </div>
      <!-- ↓投稿削除ボタンのための記述 -->
      <div class="postListDeleteImage">
        <a class="postDelete" href="{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png"><img src="images/trash-h.png"> </a>
      </div>
    </div>
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
      <a class="js-modal-close" href="">閉じる</a>
    </div>
  </div>
  <!-- ↑モーダルの中身（カリキュラムコピペ） -->
</div>
@endsection
