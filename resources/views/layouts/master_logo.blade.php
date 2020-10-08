<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="ロゴ,EC,販売,デザイナー,デザイン">
    <meta name="title" content="ロゴ広場">
    <meta name="description" content="ロゴ広場">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@twitteraccount">
    <meta property="og:site_name" content="ロゴひろば">
    <meta property="og:title" content="ロゴひろば">
    <meta property="og:description" content="サイト説明文">
    <meta property="og:url" content="https://www.hogehoge.com">
    <meta property="og:image" content="https://www.hogehoge.com./hoge.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="400">
    <meta property="og:type" content="website">

    <!-- ajax token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="http://www.hoge.hoge/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="apple-touch-icon" href="http://www.hoge.hoge/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;700&amp;display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/detail.css')}}">
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container">
      @include('layouts.header_logo')

      <main>
        @yield('content')
      </main>

      @include('layouts.footer_logo')
    </div>
    @yield('scripts')
  </body>
</html>