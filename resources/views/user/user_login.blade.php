@extends('layouts.master_logo')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/login.css')}}">
@stop

@section('content')
    <div class="login__main__wrap">
        <div class="login__main__box">
            <div class="login__leftBox">
            <form method="POST" action="{{ route('logincheck') }}" enctype="multipart/form-data">
            @csrf
            <h1>ログイン</h1>
            <div class="login__mailbox">
                <div class="login__titletext">メールアドレス</div>
                <input class="login__input" type="text" name="email" placeholder="logohiroba@gmail.com">
            </div>
            <div class="login__passBox">
                <div class="login__titletext">パスワード</div>
                <input class="login__input" type="password" name="password" placeholder="logohiroba">
            </div>
            <a href="#">
                <div class="login__forgetPass">>パスワードを忘れた方はこちら </div>
            </a>
            <button type="submit">ログインする</button>
            </form>
            </div>
            <div class="login__rightBox">
            <h2>新規登録</h2>
            <p>初めてご利用のお客様は、<br>こちらから会員登録を行ってください。</p>
            <a href="{{ route('usersign') }}"><button>新規登録する</button></a>
            </div>
        </div>
    </div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
@stop