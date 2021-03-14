<div class="mypage__menu__wrap">
    <div class="mypage__menu__box">
    <div class="mypage__menu__typeChangeBox">
        <div class="mypage__menu__usertype">一般ユーザー</div>
        <a href="{{route('change')}}">
            <div class="mypage__menu__typeChangeBT">切替</div>
        </a>
    </div>
    <div class="mypage__menu__nameTitle">ユーザー名</div>
    <div class="mypage__menu__name">{{ $user_datas->username }}</div>
    <ul class="mypage__menu__BtBox"><a href="{{route('setnews')}}">
        <li class="mypage__menu__newsBt">
            <div class="mypage__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_news.svg')}}" alt="お知らせ">
            <div class="mypage__menu__newsBtText">お知らせ</div>
            <div class="mypage__menu__newsBtMark"></div>
            </div>
        </li></a><a href="{{route('likelist')}}">
        <li class="mypage__menu__favoBt">
            <div class="mypage__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_favo.svg')}}" alt="いいね一覧">
            <div class="mypage__menu__favoBtText">いいね一覧</div>
            </div>
        </li></a><a href="{{route('buylist')}}">
        <li class="mypage__menu__historyBt">
            <div class="mypage__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_history.svg')}}" alt="購入履歴">
            <div class="mypage__menu__historyBtText">購入履歴</div>
            </div>
        </li></a><a href="{{route('setting.edit',$user_datas->id)}}">
        <li class="mypage__menu__personalBt">
            <div class="mypage__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_personal.svg')}}" alt="個人情報">
            <div class="mypage__menu__personalBtText">個人情報</div>
            </div>
        </li></a>
    </ul>
    <div class="mypage__menu__AdBox">
        <a href="{{route('userlogout')}}">
        <div class="mypage__menu__Ad1"><img src="{{asset('img/mypage_menu_Ad1.png')}}" alt="リクエストはこちら"></div>
        </a>
        <a href="{{route('logos.create')}}">
        <div class="mypage__menu__Ad2"><img src="{{asset('img/mypage_menu_Ad2.png')}}" alt="デザイナー募集中"></div>
        </a>
    </div>
</div>