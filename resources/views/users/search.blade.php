@extends('layouts.login')

@section('content')
<section class="top-page">
  <form action="/search" method="POST">
    @csrf
    <div class="search">
      <input type="text" name="search" placeholder="ユーザー名">
      <button type="submit" class="btn btn-primary">
        <svg xmlns="http://www.w3.org/2000/svg" width="2vw" height="2vw" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </button>
      @if (!empty( $search_name ))
      <p>検索ワード：{{ $search_name }}</p>
      @endif
    </div>
  </form>
</section>

<section class="userList">
@foreach($users as $user)
  @if (Auth::id() !== $user->id)
  <div class="eachUser">
    <div class="user-avatar">
      @if($user->images == 'dawn.png')
      <img src="{{ asset('images/icon1.png') }}" class="avatar">
      @else
      <img src="{{ asset('storage/avatar/'.$user->images) }}" class="avatar">
      @endif
    </div>
    <p> {{ $user->username }} </p>
    @if (Auth::user()->isFollowing($user->id))
    <a class="btn btn-danger btn-sm" href="/{{ $user->id }}/unfollow">フォロー解除</a>
    @else
    <a class="btn btn-primary btn-sm" href="/{{ $user->id }}/follow">フォローする</a>
    @endif
  </div>
  @endif
@endforeach
</section>

<!--　↓必須機能ではないがログインユーザーがヒットすると非表示ではあるがカウントはされるため「Not found」が表示されない -->
@if (count($users) == 0)
  <p>Not found</p>
@endif

@endsection
