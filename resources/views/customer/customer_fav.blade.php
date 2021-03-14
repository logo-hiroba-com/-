@extends('layouts.mastar_mypage')

@section('title', 'ロゴ一覧')

@section('styles')
<link rel="stylesheet" href="{{asset('css/customer_fav.css')}}">
@stop

@section('content')
<div class="mypage__fav__wrap">
    <div class="mypage__fav__box">
    <div class="mypage__fav__titleBox">
        <h1>いいね一覧</h1>
    </div>
    <div class="mypage__fav__favBox">
        <div class="mypage__fav__contentsBox"><a href="logo_detail.html">
            <div class="index__logobox"><img src="img_logo/ume.png" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥5,000</p>
            <p class="index__logo__text__by">by Ryusei</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="img_logo/ume.png" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="logo_detail.html">
            <div class="index__logobox"><img src="img_logo/ume.png" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥5,000</p>
            <p class="index__logo__text__by">by Ryusei</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="logo_detail.html">
            <div class="index__logobox"><img src="img_logo/ume.png" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥5,000</p>
            <p class="index__logo__text__by">by Ryusei</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a><a href="#">
            <div class="index__logobox"><img src="" alt=""></div>
            <div class="index__logo__text">
            <p class="index__logo__text__price">¥3,000</p>
            <p class="index__logo__text__by">by 名無し</p>
            </div></a></div>
    </div>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    
</script>
@stop