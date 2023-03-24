@extends('layouts.login')

@section('content')
<section class="top-page">
  <!-- ↓フォローユーザーの表示 -->
  <div class="followList">
    <p>Follow List</p>
    <div class="followList-box">
    @foreach ($following as $following)
      <a href=" /{{ $following->id }}/user_profile ">
        @if($following->images == 'dawn.png')
        <img src="{{ asset('images/icon1.png') }}" class="avatar">
        @else
        <img src="{{ asset('storage/avatar/'.$following->images) }}" class="avatar">
        @endif
      </a>
    @endforeach
    </div>
  </div>
</section>

<section class="followPost">
  @foreach($posts as $post)
  <div class="aboutPost">
    <div class="post-users">
      <a href=" /{{ $post->user_id }}/user_profile ">
        @if($post->user->images == 'dawn.png')
        <img src="{{ asset('images/icon1.png') }}" class="avatar">
        @else
        <img src="{{ asset('storage/avatar/'.$post->user->images) }}" class="avatar">
        @endif
      </a>
    </div>
    <div class="postList-content">
      <div class="postListdate">
        <p>{{ $post->updated_at }}</p>
      </div>
      <div class="postName">
        <p>{{ $post->user->username }}</p>
      </div>
      <div class="postListText">
        <p>{{ $post->post }}</p>
      </div>
    </div>
  </div>
  @endforeach
</section>
@endsection
