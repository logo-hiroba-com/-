<div class="header__top">
    <div class="header__top__contents">
        <div class="header__top__contents__left"><a class="header__logo" href="{{ route('logos.index') }}"><img src="{{asset('img/header_logo.png')}}" alt="ロゴひろば"></a>
            <div class="header__search">
            <input class="header__search__text" type="text" name="search" placeholder="ロゴを探す">
            <input class="header__saerch__btn" type="submit" value="">
            </div>
        </div>
        @if(Session::has('user_datas'))
            <a class="header__a__login" href="{{ route('setting.index') }}">
                <div class="header__login">
                    <p>マイページ</p>
                </div>
            </a>
        @else
            <a class="header__a__login" href="{{ route('userlogin') }}">
                <div class="header__login">
                    <p>ログイン/登録</p>
                </div>
            </a>
        @endif
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