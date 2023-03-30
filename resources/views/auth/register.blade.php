@extends('layouts.logout')

@section('content')

@if ($errors ->any())
<div class="alert">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
<br>
@endif


{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>
<br>
<div class="check-form">
  {{ Form::label('name','user name',['class' => 'label']) }}
  {{ Form::text('username',null,['class' => 'input']) }}
  <br><br>
  {{ Form::label('email','mail address',['class' => 'label']) }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  <br><br>
  {{ Form::label('pass','password',['class' => 'label']) }}
  {{ Form::text('password',null,['class' => 'input']) }}
  <br><br>
  {{ Form::label('pass confirm','password confirm',['class' => 'label']) }}
  {{ Form::text('password_confirmation',null,['class' => 'input']) }}
</div>
{{ Form::submit('REGISTER',['class' => 'button']) }}

<div class="link">
  <p><a href="/login">ログイン画面へ戻る</a></p>
</div>

{!! Form::close() !!}

@endsection
