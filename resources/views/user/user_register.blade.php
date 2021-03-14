
@extends('layouts.master_logo')

@section('title', '新規登録')

@section('content_header')
    <h1>新規登録</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/sigin.css')}}">
@stop

@section('content')
<div class="sigin">
    <div class="sigin__siginArea">
        <h2 class="sigin__siginArea__ttl">ユーザー登録</p>
        <form action="{{ route('usercheck') }}" method="post">
            @csrf
            <div class="sigin__siginArea__content">
                <p class="contentTitle">ユーザーネーム</p>
                <div class="content">
                    <input type="text" name="name" class="form-control" value="" placeholder="ロゴ　太郎">
                </div>
            </div>
            
            <div class="sigin__siginArea__content">
                <p class="contentTitle">メールアドレス</p>
                <div class="content">
                    <input type="email" name="email" class="form-control" value="" placeholder="例：logo.hiroba@gmail.com">
                </div>
            </div>

            <div class="sigin__siginArea__content">
                <p class="contentTitle">パスワード</p>
                <div class="content">
                    <input type="password" name="password" class="form-control" placeholder="">
                </div>
            </div>

            <div class="sigin__siginArea__content">
                <p class="contentTitle">パスワード（再入力）</p>
                <div class="content">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="">
                </div>
            </div>

            <div class="sigin__siginArea__content">
                <p class="contentTitle">ユーザータイプ</p>
                <div class="content">
                <div class="input-group-append">
                    <label class="radio" for="customer">
                        <input id="customer" type="radio" name="usertype" value="1" checked>
                        購入者として
                    </label>
                    <label class="radio" for="designer">
                        <input id="designer" type="radio" name="usertype" value="0">
                        デザイナーとして
                    </label>
                </div>
                </div>
            </div>

            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            @endif

            @if(!empty($error_num))
                @if($error_num==1)
                <p><strong>二回入力されたパスワードが違います。</strong></p>
                @else($error_num==2)
                <p><strong>すでに登録されているメールアドレスです。</strong></p>
                @endif
            @endif

            <button type="submit" class="sigin__siginArea__btn">
                登録
            </button>
        </form>
    </div>
</div>
@stop

@section('js')
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    // toConfirmBtn
</script>

@stop