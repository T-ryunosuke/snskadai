@extends('layouts.login')

@section('content')
<div class="top-page">
    <section class="user-profile">
      @foreach($posts as $post)
        <img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 40px; height: 40px;">
        <p>name    {{ $post->user->username }}</p>

        <p>bio    {{ $post->user->bio }}</p>

        @if (Auth::user()->isFollowing($post->user->id))
        <p class="unfollow-btn"><a href="{{ $post->user->id }}/unfollow">フォロー解除</a></p>
        @else
        <p class="follow-btn"><a href="{{ $post->user->id }}/follow">フォローする</a></p>
        @endif

      @endforeach
    </section>

    <section class="followPost">
      @foreach($posts as $post)
        <img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 40px; height: 40px;">
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      @endforeach
    </section>
</div>
@endsection
