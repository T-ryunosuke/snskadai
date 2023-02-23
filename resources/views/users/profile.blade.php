@extends('layouts.login')

@section('content')
<div class="top-page">

@if ($errors ->any())

<div class="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

  <form action="/up-profile" method="POST" enctype="multipart/form-data">
  @csrf
    <!--参考URL:https://www.techpit.jp/courses/139/curriculums/142/sections/1057/parts/4201 -->
    <!-- ↓アバター写真 -->
    <label for="images">
      <img src=" {{ asset('storage/avatar/'.$user->images) }} " class="rounded-circle" style="object-fit: cover; width: 40px; height: 40px;">
    </label>
    <!-- ↑ -->

    <!-- ↓ログインユーザー情報 -->
    <input type="hidden" name="id" value="{{ Auth::id() }}">

    <label for="username">user name</label>
    <input id="username" type="text" name="username" value="{{ $user->username }}" required autocomplete="username" autofocus>

    <label for="mail">mail adress</label>
    <input id="mail" type="text" name="mail" value="{{ $user->mail }}">

    <label for="password">password</label>
    <input id="password" type="password" name="password">

    <label for="password_confirmation">password comfirm</label>
    <input id="password_confirmation" type="text" name="password_confirmation">

    <label for="bio">bio</label>
    <input id="bio" type="text" name="bio" value="{{ $user->bio }}">
    <!-- ↑ -->

    <!--　↓アバター写真選択 -->
    <label for="images">icon image</label>
    <input id="images" type="file" name="images" accept="image/png,image/jpeg,image/gif">
    <!--　↑ -->

    <button type="submit">更新</button>
  </form>
</div>
@endsection
