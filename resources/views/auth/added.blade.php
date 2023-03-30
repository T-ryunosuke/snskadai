@extends('layouts.logout')

@section('content')


<div id="clear">
  <p>{{session()->get('username')}}さん</p>
  <br>
  <p>ようこそ！AtlasSNSへ！</p>
  <br><br>
  <p>ユーザー登録が完了しました。</p>
  <br>
  <p>早速ログインをしてみましょう!</p>
  <div class="login-button">
    <p><a href="/login">ログイン画面へ</a></p>
  </div>
</div>

@endsection
