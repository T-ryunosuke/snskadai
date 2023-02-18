@extends('layouts.login')

@section('content')
<div class="top-page">
  <!-- ↓フォローユーザーの表示 -->

    <section class="followList">
      <p>Follow List</p>
      @foreach ($following as $following)
          <a href="{{ $following->id }}/user_profile"><img src=" {{ asset('storage/avatar/'.$following->images) }} " class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;"></a>
      @endforeach
    </section>

    <section class="followPost">
      @foreach($posts as $post)
        <a href=" {{ $post->user_id }}/user_profile "><img src=" {{ asset('storage/avatar/'.$post->user->images) }} " class="rounded-circle" style="object-fit: cover; width: 20px; height: 20px;"></a>
        <p>{{ $post->user->username }}</p>
        <p>{{ $post->post }}</p>
      @endforeach
    </section>

</div>
@endsection
