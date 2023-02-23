@extends('layouts.login')

@section('content')
<div class="top-page">
  <!-- ↓フォロワーユーザーの表示 -->

    <section class="followingList">
      <p>Follower List</p>
      @foreach ($followed as $followed)
          <a href=" /{{ $followed->id }}/user_profile "><img src=" {{ asset('storage/avatar/'.$followed->images) }} " class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;"></a>
      @endforeach
    </section>

    <section class="followedPost">
      @foreach($posts as $post)
        <a href=" /{{ $post->user_id }}/user_profile "><img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;"></a>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      @endforeach
    </section>

</div>
@endsection
