<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/default.css') }}">
    @yield('css')
    @yield('js')
</head>
<body>
  <header class="header">
    <a href="/">
        <h1 class="title">@yield('title')</h1>
    </a>
      @yield('button')
    <nav class="header-nav">
        <a class="header-nav__link" href="/login">ログイン</a>
        <!-- <form action="/login" method="post">
            @csrf
            <button class="header-nav__link">ログイン</button>
        </form> -->
        <form action="/logout" method="post">
            @csrf
            <button class="header-nav__link">ログアウト</button>
        </form>
            <a class="header-nav__link" href="/mypage">マイページ</a>
        <a class="header-nav__link" href="/sell">出品</a>
    </nav>
  </header>
  <main>
    <div class="content">
      @yield('content')
    </div>
  </main>
</body>
</html>