@extends('layouts.login')

@section('content')
<section class="top-page">
  <form action="/search" method="POST">
    @csrf
    <div class="search">
      <div>
        <input type="text" name="search" placeholder="ユーザー名" required>
        <!--　↓虫眼鏡にする -->
        <input type="submit" value="検索">
      </div>
    </div>
  </form>

  @if (!empty( $search_name ))
  <p>検索ワード：{{ $search_name }}</p>
  @endif

</section>

<section class="userList">
@foreach($users as $user)
  @if (Auth::id() !== $user->id)
  <div class="userName">
    <p> {{ $user->username }} </p>
    @if (Auth::user()->isFollowing($user->id))
    <p class="unfollow-btn"><a href="{{ $user->id }}/unfollow">フォロー解除</a></p>
    @else
    <p class="follow-btn"><a href="{{ $user->id }}/follow">フォローする</a></p>
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
