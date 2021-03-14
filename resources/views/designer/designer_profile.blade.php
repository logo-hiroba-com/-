@extends('layouts.mastar_mypage_designer')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('css')
<!-- <link rel="stylesheet" href="{{asset('css/customer_setting.css')}}"> -->
@stop

@section('content')
<div class="mypageD__edit__wrap">
    <div class="mypageD__edit__box">
        <form action="{{route('download.index')}}">
            <button type="submit">ダウンロード</button>
        </form>
    </div>
    <div class="mypageD__edit__box">

    <form action="{{route('setdesigner.update',$id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')

        <h1>プロフィール</h1>
        <div class="mypageD__edit__img">
        @if(isset($designers->designer_path))
        <label class="mypageD__edit__imgHover" for="iconfile"></label><img src="{{asset('/storage/'.$designers->designer_path)}}" alt="{{ $designers->username }}">
        @else
        <label class="mypageD__edit__imgHover" for="iconfile"></label><img src="{{asset('img/ico-null.png')}}" alt="{{ $designers->username }}">
        @endif
        </div>
        <div class="mypageD__edit__imgFile">
        <input id="iconfile" type="file" name="icon_file" value="">
        <label for="iconfile">画像を選択</label>
        </div>
        <div class="mypageD__edit__usernameBox">
        <div class="mypageD__edit__usernameTitleBox">
            <div class="mypageD__edit__usernameTitle">ユーザーネーム</div>
            <div class="mypageD__edit__usernameAttntion">※公開されます</div>
        </div>
        <input class="mypageD__edit__usernameText" type="text" name="username" value="{{ $designers->username }}">
        </div>
        <div class="mypageD__edit__goodatBox">
        <div class="mypageD__edit__goodatTitleBox">
            <div class="mypageD__edit__goodatTitle">得意イメージ</div>
            <div class="mypageD__edit__goodatttention">※２つまで選択可能</div>
        </div>
        <div class="mypageD__edit__goodatcheckBox">
            
            @foreach($goodats as $key=>$goodat)
                @if(($goodat->id == $designers->designer_image1)||($goodat->id == $designers->designer_image2))
                <input class="goodat" id="goodat{{$key+1}}" type="checkbox" name="goodat[]" value="{{$goodat->id}}" checked>
                <label class="goodatLabel" for="goodat{{$key+1}}">{{$goodat->goodat}}</label>
                @else
                <input class="goodat" id="goodat{{$key+1}}" type="checkbox" name="goodat[]" value="{{$goodat->id}}">
                <label class="goodatLabel" for="goodat{{$key+1}}">{{$goodat->goodat}}</label>
                @endif
            @endforeach

        </div>
        </div>
        <div class="mypageD__edit__prBox">
        <div class="mypageD__edit__prTitleBox">
            <div class="mypageD__edit__prTitle">自己PR</div>
            <div class="mypageD__edit__prAttention">※200文字まで</div>
        </div>
        <textarea class="mypageD__edit__prText" name="prText" maxlength="200">{{$designers->designer_intro}}</textarea>
        </div>
        <div class="mypageD__edit__saveBox">
            <a href="{{ route('setting.index') }}">
                <div class="mypageD__edit__cancel">キャンセル</div>
            </a>
            <button type="submit" class="mypageD__edit__save">保存</button>
        </div>
    </form>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/mypageD_edit.js')}}"></script>
@stop