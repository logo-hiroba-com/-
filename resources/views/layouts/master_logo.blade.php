<!DOCTYPE html>
<html lang="ja">
  <head>
    @include('layouts.meta_logo')
    <!-- ajax token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/vnd.microsoft.icon">
    <link rel="apple-touch-icon" href="{{asset('img/logohiroba_logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    @yield('styles')
    <title>@yield('title')</title>
  </head>
  <body>
    <div class="container">
      
      <header id="header">      
        @include('layouts.header_logo')
      </header>

      <main>
        @yield('content')
      </main>

      @include('layouts.footer_logo')
    </div>
    @yield('scripts')
  </body>
</html>