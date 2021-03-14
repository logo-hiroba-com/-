<div class="header__top">
    <div class="header__top__contents">
    <div class="header__top__contents__left"><a class="header__logo" href="{{ route('logos.index') }}"><img src="{{asset('img/header_logo.png')}}" alt="ロゴひろば"></a>
        <div class="header__search">
        <input class="header__search__text" type="text" name="search" placeholder="ロゴを探す">
        <input class="header__saerch__btn" type="submit" value="">
        </div>
    </div>
    <div class="header__top__contents__right">
        <a class="header__a__mail" href="{{ route('logos.index') }}">
        <div class="header__mail"><img class="mail" src="{{asset('img/headrer_icon_mail.png')}}" alt="お問い合わせ">
            <p>お問い合わせ</p>
        </div></a>
        @if(Session::has('user_datas'))
            <a class="header__a__login" href="{{ route('settings.index') }}">
                <div class="header__login"><p>{{session('user_datas')["username"]}}</p></div>
            </a>
        @else
            <a class="header__a__login" href="{{ route('userlogin') }}">
            <div class="header__login"><img src="{{asset('img/header_icon_login.png')}}" alt="ログイン">
                <p>ログイン</p>
            </div></a>
        @endif
    </div>
    </div>
</div>
<nav class="header__nav">
    <ul class="header__nav__ul"><a href="{{route('logos.index')}}">
        <li>
        <div><img src="{{asset('img/header_navi_search.png')}}" alt="ロゴを探す">
            <p>ロゴを探す</p>
        </div>
        </li></a><a href="#">
        <li>
        <div><img src="{{asset('img/header_navi_first.png')}}" alt="初めての方へ">
            <p>初めての方へ</p>
        </div>
        </li></a><a href="#">
        <li>
        <div><img src="{{asset('img/header_navi_price.png')}}" alt="料金について">
            <p>料金について</p>
        </div>
        </li></a><a href="#">
        <li>
        <div><img src="{{asset('img/header_navi_popular.png')}}" alt="人気のデザイナー">
            <p>人気のデザイナー</p>
        </div>
        </li></a><a href="#">
        <li>
        <div><img src="{{asset('img/header_navi_question.png')}}" alt="よくある質問">
            <p>よくある質問</p>
        </div>
        </li></a><a href="#">
        <li>
        <div><img src="{{asset('img/header_navi_designer.png')}}" alt="デザイナー募集">
            <p>デザイナー募集</p>
        </div>
        </li></a></ul>
</nav>