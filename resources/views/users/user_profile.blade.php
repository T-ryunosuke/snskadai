@extends('layouts.login')

@section('content')
<section class="top-page">
  <div class="user-profile">
    @foreach($profile as $profile)
    <div class="my-avatar">
      <img src=" {{ asset('storage/avatar/'.$profile->images) }} " class="avatar">
    </div>

    <div class="introduction">
      <p>name&emsp;&emsp;&emsp;&emsp;{{ $profile->username }}</p>
      <div class="spacer"></div>
      <p>bio&emsp;&emsp;&emsp;&emsp;&emsp;{{ $profile->bio }}</p>
      @if (Auth::user()->isFollowing($profile->id))
      <a class="btn btn-danger btn-sm" href="/{{ $profile->id }}/unfollow">フォロー解除</a>
      @else
      <a class="btn btn-primary btn-sm" href="/{{ $profile->id }}/follow">フォローする</a>
      @endif
    </div>
    @endforeach
  </div>
</section>

<section class="followPost">
  @foreach($posts as $post)
  <div class="aboutPost">
    <div class="post-users">
      @if($post->user->images == 'dawn.png')
      <img src="{{ asset('images/icon1.png') }}" class="avatar">
      @else
      <img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="avatar">
      @endif
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
