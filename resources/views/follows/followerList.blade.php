@extends('layouts.login')

@section('content')
<div class="top-page">
  <!-- ↓フォロワーユーザーの表示 -->

    <section class="followingList">
      <p>Follower List</p>
      @foreach ($followed as $followed)
          <a href=" /{{ $followed->id }}/user_profile ">
            @if($followed->images == 'dawn.png')
              <img src="{{ asset('images/icon1.png') }}" class="avatar">
            @else
              <img src="{{ asset('storage/avatar/'.$followed->images) }}" class="avatar">
            @endif
          </a>
      @endforeach
    </section>

    <section class="followedPost">
      @foreach($posts as $post)
        <a href=" /{{ $post->user_id }}/user_profile ">
          @if($post->user->images == 'dawn.png')
            <img src="{{ asset('images/icon1.png') }}" class="avatar">
          @else
          <img src="{{ asset('storage/avatar/'.$post->user->images) }}" class="avatar">
          @endif
        </a>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      @endforeach
    </section>

</div>
@endsection
