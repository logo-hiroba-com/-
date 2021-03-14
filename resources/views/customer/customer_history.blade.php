@extends('layouts.mastar_mypage')

@section('title', 'ロゴ一覧')

@section('styles')
<link rel="stylesheet" href="{{asset('css/customer_history_detail.css')}}">
@stop

@section('content')
<div class="mypage__history__wrap">
    <div class="mypage__history__box">
    <div class="mypage__history__titleBox">
        <h1>購入履歴</h1>
    </div>
    <div class="mypage__history__historyBox">
        <!--ロゴ無いときはこれを表示-->
        <div class="mypage__history__none">
        <p>購入したロゴはありません</p>
        </div><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a><a href="mypage_history_detail.html">
        <div class="mypage__history__contentsBox"><img src="img_logo/ume.png" alt="">
            <div class="titleBox">
            <div class="title">梅美人</div>
            <div class="cantentsText description">京都の町を夜な夜な歩く梅美人さんの顔をロゴにしたものです。その美しさの秘密は梅を使ったオリジナルの化粧水だと言われています。</div>
            </div>
            <div class="priceBox">
            <div class="title">商品代金</div>
            <div class="cantentsText price">¥3000</div>
            </div>
            <div class="infoBox">
            <div class="title">購入日</div>
            <div class="cantentsText day">2020/05/01</div>
            <div class="title">制作者</div>
            <div class="cantentsText username">こうたろう</div>
            </div>
        </div></a>
    </div>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    
</script>
@stop