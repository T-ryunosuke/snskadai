<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!--追加：Bootstrap適用※独自stylesheetの前にbootのlinkを設置-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <!--追加：jQuery適用-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</head>
<body>
  <header>
    <div id="head">
      <div id="logo">
        <h1><a href="/top"><img src=" {{ asset('images/atlas.png') }} " alt="Atlas" class="atlas"></a></h1>
      </div>
      <div class="login-user">
        <p>{{ Auth::user()->username }}&nbsp;さん</p>
      </div>
      <!--アコーディオンボタン↓-->
      <div class="accordion-button">
        <i class="bi bi-chevron-up" type="button" data-bs-toggle="collapse" data-bs-toggle="button" data-bs-target=".side-menu"></i>
      </div>
      <!--アコーディオンボタン↑-->
      <div class="login-avatar">
        @if(Auth::user()->images == 'dawn.png')
        <img src="{{ asset('images/icon1.png') }}" class="avatar">
        @else
        <img src="{{ asset('storage/avatar/'.Auth::user()->images) }}" class="avatar">
        @endif
      </div>
    </div>
  </header>
  <div id="row">
    <div id="container">
      @yield('content')
    </div >
    <div id="side-bar">
      <div class="collapse side-menu">
        <ul>
          <li><a href="/top">ホーム</a></li>
          <li><a href="/profile">プロフィール編集</a></li>
          <li><a href="/logout">ログアウト</a></li>
        </ul>
      </div>
      <div class="collapse show side-menu" id="confirm">
        <div class="side">
          <p>{{ Auth::user()->username }}さんの</p>
          <div>
            <p>フォロー数&emsp;&emsp;&emsp;{{ Auth::user()->following()->count() }}名</p>
          </div>
          <div class="text-right">
            <a class="btn btn-primary btn-sm" href="/follow-list" role="button">フォローリスト</a>
          </div>
          <div>
            <p>フォロワー数&emsp;&emsp;{{ Auth::user()->followed()->count() }}名</p>
          </div>
          <div class="text-right">
            <a class="btn btn-primary btn-sm" href="/follower-list" role="button">フォロワーリスト</a>
          </div>
        </div>
      </div>
      <div class="search-button">
        <a class="btn btn-primary btn-sm" href="/search" role="button">ユーザー検索</a>
      </div>
    </div>
  </div>
<footer>
</footer>
  <!--↓多分上方に記述追加してるので不要-->
  <script src="JavaScriptファイルのURL"></script>
</body>
</html>
