<div class="mypageD__menu__wrap">
    <div class="mypageD__menu__box">
    <div class="mypage__top__flexBox">
        <div class="mypageD__menu__rankBox">
        <div class="mypageD__menu__rankTitle">会員ランク</div>
        <div class="mypageD__menu__rankImgBox">
            <div class="mypageD__menu__rankBronzeBox"><img class="mypageD__menu__rankBronze" src="{{asset('img/mypageD_rank_Bronze.png')}}" alt="ブロンズランク"></div><img class="mypageD__menu__rankBar" src="{{asset('img/mypageD_rank_bar.svg')}}" alt="仕切り">
            <div class="mypageD__menu__rankSilverBox"><img class="mypageD__menu__rankSilver" src="{{asset('img/mypageD_rank_Silver.png')}}" alt="シルバーランク"></div><img class="mypageD__menu__rankBar" src="{{asset('img/mypageD_rank_bar.svg')}}" alt="仕切り">
            <div class="mypageD__menu__rankGoldBox"><img class="mypageD__menu__rankGold" src="{{asset('img/mypageD_rank_Gold.png')}}" alt="ゴールドランク"></div>
        </div>
        <div class="mypageD__menu__rankTextBox">
            <div class="mypageD__menu__rankTextBronze">ブロンズ</div>
            <div class="mypageD__menu__rankTextSilver">シルバー</div>
            <div class="mypageD__menu__rankTextGold">ゴールド</div>
        </div>
        </div>
        <div class="mypageD__menu__typeChangeBox">
        <div class="mypageD__menu__usertype">デザイナー</div>
            <a href="{{route('change')}}">
                <div class="mypageD__menu__typeChangeBT">切替</div>
            </a>
        </div>
    </div>
    <div class="mypageD__menu__flexBox2">
        @if(isset($designers->designer_path))
        <div class="mypageD__menu__nameBox"><img class="mypageD__menu__img" src="{{asset('/storage/'.$designers->designer_path)}}" alt="{{ $user_datas->username }}">
        @else
        <div class="mypageD__menu__nameBox"><img class="mypageD__menu__img" src="{{asset('img/ico-null.png')}}" alt="{{ $user_datas->username }}">
        @endif
        
        <div class="mypageD__menu__name">{{ $user_datas->username }}</div>
        </div>
        <a href="{{route('setdesigner.edit',$user_datas->id)}}">
        <div class="mypage__menu_profedit">プロフィール編集</div>
        </a>
    </div>
    <div class="mypageD__menu__goodatBox">
        <div class="mypageD__menu__goodatTitle">得意イメージ</div>
        <div class="mypageD__menu__goodatFlexBox">
        @if(isset($designers->goodat1->goodat))
            <div class="mypageD__menu__goodatText">{{$designers->goodat1->goodat}}</div>
        @else
            <div class="mypageD__menu__goodatText">未記入</div>
            <div class="mypageD__menu__goodatText">　</div>
        @endif
        @if(isset($designers->goodat2->goodat))
            <div class="mypageD__menu__goodatText">{{$designers->goodat2->goodat}}</div>
        @else
            <div class="mypageD__menu__goodatText">　</div>
        @endif
        </div>
    </div>
    <div class="mypageD__menu__prBox">
        <div class="mypageD__menu__prTitle">自己PR</div>
        @if(isset($designers->designer_intro))
        <p class="mypageD__menu__prText">{{$designers->designer_intro}}</p>
        @else
        <p class="mypageD__menu__prText">未記入</p>
        @endif
    </div>
    <ul class="mypageD__menu__BtBox">
        <a href="{{route('setnews')}}">
        <li class="mypageD__menu__newsBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_news.svg')}}" alt="お知らせ">
            <div class="mypageD__menu__newsBtText">お知らせ</div>
            <div class="mypageD__menu__newsBtMark"></div>
            </div>
        </li></a>
        <a href="{{route('logos.create')}}">
        <li class="mypageD__menu__favoBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypageD_menu_post.svg')}}" alt="作品を投稿する">
            <div class="mypageD__menu__favoBtText">作品を投稿する</div>
            </div>
        </li></a>
        <a href="mypage_history.html">
        <li class="mypageD__menu__historyBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypageD_menu_works.svg')}}" alt="投稿した作品一覧、または、編集">
            <div class="mypageD__menu__historyBtText">投稿した作品一覧 / 編集</div>
            </div>
        </li></a>
        <a href="mypage_setting.html">
        <li class="mypageD__menu__personalBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypageD_menu_money.svg')}}" alt="振り込み申請">
            <div class="mypageD__menu__personalBtText">振り込み申請</div>
            </div>
        </li></a>
        <a href="{{route('userlogout')}}">
        <li class="mypageD__menu__personalBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypageD_menu_request.svg')}}" alt="リクエスト確認">
            <div class="mypageD__menu__personalBtText">リクエスト確認</div>
            </div>
        </li></a>
        <a href="{{route('setting.edit',$user_datas->id)}}">
        <li class="mypageD__menu__personalBt">
            <div class="mypageD__menu__BtContentsBox"><img src="{{asset('img/mypage_menu_personal.svg')}}" alt="個人情報">
            <div class="mypageD__menu__personalBtText">個人情報</div>
            </div>
        </li></a>
        </ul>
    </div>
</div>