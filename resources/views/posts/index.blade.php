@extends('layouts.login')

@section('content')
<div class="top-page">
      <form action="{{ url('posts') }}" method="POST">
 <!-- ↓送信されるデータを保護する -->
      @csrf
      <!-- 投稿の本文 -->
      <div class="post">
        <div>
          <input type="text" name="post">
          <!--　登録ボタン -->
          <input type="image" src="images/post.png" class="post-image"></input>
        </div>
      </div>

    </form>
</div>
  <!-- 全ての投稿リスト -->
@if (count($posts) > 0)
    <div class="postList">
            @foreach ($posts as $post)
              <div class="post-one">
                <!-- 投稿者名の表示 -->
                <div class="postName">
                  <p>{{ $post->user->username }}</p>
                </div>
                <!-- 投稿詳細 -->
                <div class="postListText">
                  <p>{{ $post->post }}</p>
                </div>
                <div class="postListImage">
                  <div class="postListEditImage">
                  <a href=""><img src="images/edit.png"></a>
                  </div>
                  <div class="postListDeleteImage">
                    <a class="postDelete" href="{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png"><img src="images/trash-h.png"></a>
                  </div>
                </div>
              </div>
            @endforeach

    <!-- ↓モーダルの中身（カリキュラムコピペ） -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
    <!-- ↑モーダルの中身（カリキュラムコピペ） -->

    </div>
@endif
@endsection
