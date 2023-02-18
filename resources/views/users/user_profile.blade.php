@extends('layouts.login')

@section('content')
<div class="top-page">
    <section class="user-profile">
      @foreach($profile as $profile)
        <img src=" {{ asset('storage/avatar/'.$profile->images) }} " class="rounded-circle" style="object-fit: cover; width: 40px; height: 40px;">
        <p>name    {{ $profile->username }}</p>

        <p>bio    {{ $profile->bio }}</p>

        @if (Auth::user()->isFollowing($profile->id))
        <p class="unfollow-btn"><a href="{{ $profile->id }}/unfollow">フォロー解除</a></p>
        @else
        <p class="follow-btn"><a href="{{ $profile->id }}/follow">フォローする</a></p>
        @endif

      @endforeach
    </section>
</div>
    <section class="followPost">
      @foreach($posts as $post)
        <img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 40px; height: 40px;">
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      @endforeach
    </section>

@endsection
