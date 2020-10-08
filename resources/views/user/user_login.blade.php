@extends('layouts.master_logo')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/logo_login.css')}}">
@stop

@section('content')
<div class="login">
    <form class="login__loginArea" method="post" action="{{ route('userlogin') }}" enctype="multipart/form-data">
        @csrf
        <h2 class="login__loginArea__ttl">ログイン</h2>
        <div class="login__loginArea__content">
            <p class="contentTitle">メールアドレス</p>
            <p class="content"><input name="email" type="text" value=""></p>
        </div>
        <div class="login__loginArea__content">
            <p class="contentTitle">パスワード</p>
            <p class="content"><input name="password" type="password" value=""></p>
        </div>
        <button class="login__loginArea__send" type="submit">ログイン</button>
    </form>
    <div class="login__siginArea">
        <h2 class="login__siginArea__ttl">新規登録</h2>
        <p>初めてご利用のお客様は、<br>
        こちらから会員登録を行って下さい。</p>
        <p class="login__siginArea__link"><a href="{{ route('usersign') }}">新規登録はこちら</a></p>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<!-- <script src="{{asset('/js/logo_list.js')}}"></script> -->
@stop