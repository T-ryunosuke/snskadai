@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>
<br>
<div class="check-form">
  {{ Form::label('email','mail address',['class' => 'label']) }}
  {{ Form::text('mail',null,['class' => 'input']) }}
  <br><br>
  {{ Form::label('pass','password',['class' => 'label']) }}
  {{ Form::password('password',['class' => 'input']) }}
</div>
{{ Form::submit('LOGIN',['class' => 'button']) }}
<br>
<div class="link">
  <p><a href="/register">新規ユーザーの方はこちら</a></p>
</div>

{!! Form::close() !!}

@endsection
