<!DOCTYPE HTML>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link href="{{ url('/') }}/dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/dist/css/flat-ui.min.css" rel="stylesheet">
  <link href="{{ url('/') }}/css/starter-template.css" rel="stylesheet">
  @yield('styles')
</head>
<body>

@include('partials.header')
<div class="container">
  @yield('content')
</div>
 
<footer class="footer">
  <div class="container">
  <p class="text-muted">デザイナー登録</p>
  </div>
</footer>
 
<!-- Bootstrap core JavaScript
  ================================================== -->
<script src="{{ url('/') }}/dist/js/vendor/jquery.min.js"></script>
<script src="{{ url('/') }}/dist/js/vendor/video.js"></script>
<script src="{{ url('/') }}/dist/js/flat-ui.min.js"></script>
 
<script src="{{ url('/') }}/assets/js/prettify.js"></script>
<script src="{{ url('/') }}/assets/js/application.js"></script>
 
</body>
</html>