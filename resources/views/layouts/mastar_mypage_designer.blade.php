<!DOCTYPE html>
<html lang="ja">
  <head>
    @include('layouts.meta_logo')

    <!-- ajax token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="http://www.hoge.hoge/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="apple-touch-icon" href="http://www.hoge.hoge/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;700&amp;display=swap" rel="stylesheet">
    @yield('styles')
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/mypageD_edit.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer_setting.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer_history_detail.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer_history.css')}}">
    <link rel="stylesheet" href="{{asset('css/customer_news.css')}}">
    <title>@yield('title') | ロゴひろば</title>
  </head>
  <body>
    <div class="container">
      <header id="header">   
        @include('layouts.header_logo')
      </header>

      <main>
        @yield('content')
        @include('layouts.menu_logo_designer')
      </main>

      @include('layouts.footer_logo')
    </div>
    
    @yield('scripts')
  </body>
</html>