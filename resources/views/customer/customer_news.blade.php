@extends('layouts.mastar_mypage')

@section('title', 'ロゴ一覧')

@section('styles')
<link rel="stylesheet" href="{{asset('css/customer_news.css')}}">
@stop

@section('content')
<div class="mypageD__news__wrap">
    <div class="mypageD__news__box">
        <div class="mypageD__news__titleBox">
            <h1>お知らせ</h1>
        </div>
        <div class="mypageD__news__wnewsBox"><a href="#">
            <div class="mypageD__news__contentsBox">
                <div class="mypageD__news__logoBox">
                <div class="redcircle"></div><img class="mypageD__menu__logoImg" src="img/header_navi_search.png" alt="お知らせジャンル">
                </div>
                <div class="mypageD__news__textBox">
                <div class="mypageD__news__textTitle">タイトル </div>
                <div class="mypageD__news__text">あいうえおあいうえおあいうえおあいうえお</div>
                </div>
                <div class="mypageD__news__dayBox"><img src="img/mypage_news_day.svg" alt="日付">
                <div class="mypageD__news__day">1日前</div>
                </div>
            </div></a><a href="#">
            <div class="mypageD__news__contentsBox">
                <div class="mypageD__news__logoBox">
                <div class="redcircle"></div><img class="mypageD__menu__logoImg" src="img/header_navi_search.png" alt="お知らせジャンル">
                </div>
                <div class="mypageD__news__textBox">
                <div class="mypageD__news__textTitle">タイトル</div>
                <div class="mypageD__news__text">あいうえおあいうえおあいうえおあいうえお</div>
                </div>
                <div class="mypageD__news__dayBox"><img src="img/mypage_news_day.svg" alt="日付">
                <div class="mypageD__news__day">1日前</div>
                </div>
            </div></a><a href="#">
            <div class="mypageD__news__contentsBox">
                <div class="mypageD__news__logoBox">
                <div class="redcircle"></div><img class="mypageD__menu__logoImg" src="img/header_navi_search.png" alt="お知らせジャンル">
                </div>
                <div class="mypageD__news__textBox">
                <div class="mypageD__news__textTitle">タイトル</div>
                <div class="mypageD__news__text">あいうえおあいうえおあいうえおあいうえお</div>
                </div>
                <div class="mypageD__news__dayBox"><img src="img/mypage_news_day.svg" alt="日付">
                <div class="mypageD__news__day">1日前</div>
                </div>
            </div></a><a href="#">
            <div class="mypageD__news__contentsBox">
                <div class="mypageD__news__logoBox">
                <div class="redcircle"></div><img class="mypageD__menu__logoImg" src="img/header_navi_search.png" alt="お知らせジャンル">
                </div>
                <div class="mypageD__news__textBox">
                <div class="mypageD__news__textTitle">タイトル</div>
                <div class="mypageD__news__text">あいうえおあいうえおあいうえおあいうえお</div>
                </div>
                <div class="mypageD__news__dayBox">
                <div class="redcircle"></div><img src="img/mypage_news_day.svg" alt="日付">
                <div class="mypageD__news__day">1日前</div>
                </div>
            </div></a><a href="#">
            <div class="mypageD__news__contentsBox">
                <div class="mypageD__news__logoBox">
                <div class="redcircle"></div><img class="mypageD__menu__logoImg" src="img/header_navi_search.png" alt="お知らせジャンル">
                </div>
                <div class="mypageD__news__textBox">
                <div class="mypageD__news__textTitle">タイトル</div>
                <div class="mypageD__news__text">あいうえおあいうえおあいうえおあいうえお</div>
                </div>
                <div class="mypageD__news__dayBox"><img src="img/mypage_news_day.svg" alt="日付">
                <div class="mypageD__news__day">1日前</div>
                </div>
            </div></a></div>
        <ul class="mypageD__news__pagenation__box">
            <li class="mypageD__news__pagenation__back"><a href="#"><i class="fas fa-chevron-left"></i>
                <div class="mypageD__news__pagenation__back__text">前へ</div></a></li>
            <li class="mypageD__news__pagenation__num pagenation__now"> <a href="#">
                <div>1</div></a></li>
            <li class="mypageD__news__pagenation__num"><a href="#">
                <div>2</div></a></li>
            <li class="mypageD__news__pagenation__num"><a href="#">
                <div>3</div></a></li>
            <li class="mypageD__news__pagenation__next"><a href="#">
                <div class="pagination__next__text">次へ</div><i class="fas fa-chevron-right"></i></a></li>
        </ul>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    
</script>
@stop