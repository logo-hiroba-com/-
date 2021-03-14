@extends('layouts.mastar_mypage')

@section('title', '購入履歴')

@section('styles')
@@parent
<link rel="stylesheet" href="{{asset('css/customer_history.css')}}">
@endsection

@section('content')
<div class="mypage__historyDt__wrap"> 
    <div class="mypage__historyDt__box">
    <div class="mypage__historyDt__titleBox">
        <h1>購入履歴</h1>
    </div>
    <div class="myoage__historyDt__box">
        <h2 class="myoage__historyDt__title">梅美人風なロゴ</h2>
        <div class="myoage__historyDt__idrepBox">
        <div class="myoage__historyDt__idbox">
            <p class="myoage__historyDt__idtemp">ロゴID:</p>
            <p>000-001</p>
        </div>
        </div>
        <div class="myoage__historyDt__comtent">
        <div class="myoage__historyDt__left"><img class="myoage__historyDt__img" src="img_logo/ume.png" alt="ロゴ">
            <div class="myoage__historyDt_sampleimg">
            <ul>
                <li>
                <div></div>
                </li>
                <li>
                <div></div>
                </li>
                <li>
                <div></div>
                </li>
            </ul>
            </div>
        </div>
        <div class="myoage__historyDt__right">
            <ul>
            <li>
                <div class="myoage__historyDt__selectbox">カラー</div>
                <div class="myoage__historyDt__selecttext">ブルー</div>
                <div class="myoage__historyDt__selecttext">レッド</div>
            </li>
            <li>
                <div class="myoage__historyDt__selectbox">形</div>
                <div class="myoage__historyDt__selecttext">W</div>
            </li>
            <li>
                <div class="myoage__historyDt__selectbox">イメージ</div>
                <div class="myoage__historyDt__selecttext">さわやか</div>
                <div class="myoage__historyDt__selecttext">かわいい</div>
            </li>
            <li>
                <div class="myoage__historyDt__selectbox">業種</div>
                <div class="myoage__historyDt__selecttext">修理･メンテナンス</div>
                <div class="myoage__historyDt__selecttext">梅干し関連</div>
                <div class="myoage__historyDt__selecttext">和</div>
            </li>
            </ul>
            <div class="myoage__historyDt__conceptBox">
            <p class="myoage__historyDt__conceptTitle">コンセプト</p>
            <p class="myoage__historyDt__concepyText">京都の町を練り歩いている古風な美人さん。その美しさの秘訣は梅を使った自家製化粧水だった!?</p>
            </div>
            <div class="myoage__historyDt__priceBox">
            <div class="myoage__historyDt__price">¥1,000</div>
            <div class="myoage__historyDt__tax">+ tax</div>
            </div>
            <div class="myoage__historyDt__buybtn">ダウンロード</div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('scripts')
@@parent
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    
</script>
@endsection