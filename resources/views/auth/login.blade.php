@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/login']) !!}

<p>AtlasSNSへようこそ</p>
<br><br>
{{ Form::label('mail adress') }}
<br>
{{ Form::text('mail',null,['class' => 'input']) }}
<br><br>
{{ Form::label('password') }}
<br>
{{ Form::password('password',['class' => 'input']) }}
<br>
{{ Form::submit('ログイン') }}
<br><br><br>
<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
