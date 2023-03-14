@extends('layouts.login')

@section('content')
<div class="top-page">
  <!-- ↓フォローユーザーの表示 -->

    <section class="followList">
      <p>Follow List</p>
      @foreach ($following as $following)
          @if($following->images == 'dawn.png')
            <img src="{{ asset('images/icon1.png') }}" class="avatar">
          @else
          <a href=" /{{ $following->id }}/user_profile ">
            <img src="{{ asset('storage/avatar/'.$following->images) }}" class="avatar">
          </a>
          @endif
      @endforeach
    </section>

    <section class="followPost">
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
