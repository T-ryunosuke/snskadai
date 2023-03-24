@extends('layouts.login')

@section('content')
<section class="top-page">
  <!-- ↓フォロワーユーザーの表示 -->
  <div class="followList">
    <p>Follower List</p>
    <div class="followList-box">
    @foreach ($followed as $followed)
      <a href=" /{{ $followed->id }}/user_profile ">
        @if($followed->images == 'dawn.png')
        <img src="{{ asset('images/icon1.png') }}" class="avatar">
        @else
        <img src="{{ asset('storage/avatar/'.$followed->images) }}" class="avatar">
        @endif
      </a>
    @endforeach
    </div>
  </div>
</section>

<section class="followedPost">
  @foreach($posts as $post)
  <div class="aboutPost">
    <a href=" /{{ $post->user_id }}/user_profile ">
      @if($post->user->images == 'dawn.png')
      <img src="{{ asset('images/icon1.png') }}" class="avatar">
      @else
      <img src="{{ asset('storage/avatar/'.$post->user->images) }}" class="avatar">
      @endif
    </a>
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
