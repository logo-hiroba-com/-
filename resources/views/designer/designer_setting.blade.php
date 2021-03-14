@extends('layouts.mastar_mypage_designer')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
<link rel="stylesheet" href="{{asset('css/customer_setting.css')}}">
@stop

@section('content')
<div class="mypage__setting__wrap">
    <div class="mypage__setting__box">
        <form action="" method="post">
            <div class="mypage__setting__titleBox">
                <h1>個人情報</h1>
            </div>
            <div class="mypage__setting__contentsBox">
                <div class="mypage__setting__left">
                    <ul>
                    <li class="mypage__setting__menu">ユーザー設定</li>
                    <li class="mypage__setting__menu">メールアドレスの変更</li>
                    <li class="mypage__setting__menu">パスワードの変更</li>
                    </ul>
                </div>
                <div class="mypage__setting__right__user">
                    <div class="usernameTitle__box">
                        <div class="usernameTitle">ユーザー名</div>
                        <div class="usernameTitle__caution">※ユーザーに公開</div>
                    </div>
                    <input class="username_input" type="text" name="username" value="{{$user_datas->username}}">
                    <div class="nameTitle__box">
                        <div class="nameTitle">氏名</div>
                        <div class="nameTitle__caution">※ユーザーに公開されることはありません</div>
                    </div>
                    @if(isset($designers->realname))
                        <input class="name_input" type="text" name="name" value="{{$designers->realname}}">
                    @else
                        <input class="name_input" type="text" name="name" value="未記入"> 
                    @endif
                    <div class="selectType__box">
                        <div class="selectTypeTitleBox">
                            <div class="selectTypeTitle">ユーザー選択</div>
                            <div class="selectType__caution">※マイページより切り替えが可能です</div>
                        </div>
                    </div>
                    <div class="selectType__contentsBox">
                        @if($user_datas->user_type == 1)
                        <div class="selectType__inputBox1">
                            <label>
                                <input id="general" type="radio" name="type" value="general" checked><span>一般ユーザー</span>
                            </label>
                        </div>
                        <div class="selectType__inputBox2">
                            <label>
                                <input id="designer" type="radio" name="type" value="designer"><span>デザイナー</span>
                            </label>
                        </div>
                        @else
                        <div class="selectType__inputBox1">
                            <label>
                                <input id="general" type="radio" name="type" value="general"><span>一般ユーザー</span>
                            </label>
                        </div>
                        <div class="selectType__inputBox2">
                            <label>
                                <input id="designer" type="radio" name="type" value="designer" checked><span>デザイナー</span>
                            </label>
                        </div>
                        @endif
                    </div>
                    <div class="save">保存</div>
                </div>
                <div class="mypage__setting__right__mail">
                    <div class="mailTitle">メールアドレスの変更</div>
                        <div class="mailCurrent__box">
                        <div class="mailCurrent__text">現在のメールアドレス</div>
                        <div class="mailCurrent__bar">|</div>
                        <div class="mailCurrent__address">{{$user_datas->mail}}</div>
                    </div>
                    <input class="mailNew__input" type="text" name="name" value="" placeholder="新しいメールアドレス">
                    <div class="save">保存</div>
                </div>
                <div class="mypage__setting__right__password">
                    <div class="passwordTitle">パスワードの変更</div>
                        <input class="passwordCurrent__input" type="text" name="name" value="" placeholder="現在のパスワード">
                        <input class="passwordNew__input" type="text" name="name" value="" placeholder="新しいパスワード">
                    <div class="save">保存</div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/mypage_setting.js')}}"></script>
@stop