@extends('layouts.master_logo')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('content')
<main>
    <div class="logo_detail_menu_wrap">
        <div class="logo_detail_menu_box">
            <p><img src="img/header_navi_search_big.png" alt="ロゴを探す"></p>
            <p>ロゴを探す</p>
        </div>
    </div>
    <div class="logoDetail__page_wrap">
        <div class="logoDetail__page_box">
        <ul>
            <li><a href="{{ route('logos.index') }}">
                <p>ホーム</p></a></li>
            <li>></li>
            <li><a href="{{ route('logos.index') }}">
                <p>ロゴを探す</p></a></li>
            <li>></li>
            <li>{{$logo_now->fill_to_zero()}}</li>
        </ul>
        </div>
    </div>
    
    <div class="logo__detail__main__wrap">
        <div class="logo__detail__main__box">
        <h1 class="logo__detail__main__title">{{$logo_now->logoProperty->logo_title}}</h1>
        <div class="logo__detail__main__idrepBox">
            <div class="logo__detail__main__idbox">
            <p class="logo__detail__main__idtemp">ロゴID:</p>
            <p>{{$logo_now->fill_to_zero()}}</p>
            </div>
            <div class="loogo__detail__main__reportBox"><img src="{{asset('img/logo_detail_report.png')}}" alt="通報ボタン">
            <p>このロゴを通報する</p>
            </div>
        </div>
        <div class="logo__detail__main__comtent">
            <div class="logo__detail__main__left">
                <p class="logo__detail__main__imgBox"><img class="logo__detail__main__img" src="/storage/{{ $logo_now->logoImage->cust_before_path }}" alt="{{ $logo_now->logoProperty->logo_title }}"></p>
                <div class="logo__detail__main_sampleimg">
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
                    <li>
                        <div></div>
                    </li>
                    <li>
                        <div></div>
                    </li>
                    </ul>
                </div>
            </div>
            <div class="logo__detail__main__right">
            <ul>
                <li>
                <div class="logo__detail__main__selectbox">カラー</div>
                <div class="logo__detail__main__selecttext">{{$logo_now->logoProperty->logoColor->color_name}}</div>
                </li>
                <li>
                <div class="logo__detail__main__selectbox">形</div>
                <div class="logo__detail__main__selecttext">{{$logo_now->logoProperty->format_name()}}</div>
                </li>
                <li>
                <div class="logo__detail__main__selectbox">イメージ</div>
                @foreach($logo_now->logoImprove as $improve)
                <div class="logo__detail__main__selecttext">{{$improve->improve_name}}</div>
                @endforeach
                </li>
                <li>
                <div class="logo__detail__main__selectbox">ジャンル</div>
                @foreach($logo_now->logoType as $type)
                <div class="logo__detail__main__selecttext">{{$type->type_name}}</div>
                @endforeach
                </li>
            </ul>
            <div class="logo__detail__main__conceptBox">
                <p class="logo__detail__main__conceptTitle">コンセプト</p>
                <p class="logo__detail__main__concepyText">{{$logo_now->logoProperty->logo_concept}}</p>
            </div>
            <div class="logo__detail__main__priceBox">
                <div class="logo__detail__main__price">¥{{$logo_now->logo_price()}}</div>
                <div class="logo__detail__main__tax">+ tax</div>
            </div><a href="#">
                <div class="logo__detail__main__buybtn">ロゴをカスタマイズして購入</div></a><a href="#">
                <div class="logo__detail__main__favbtn">お気に入り登録</div></a>
            </div>
        </div>
        </div>
    </div>
    <div class="logo__detail__designer__wrap">
        <h2 class="logo_detail_designer__title">制作デザイナー</h2>
        <div class="logo__detail__designer__box">
        <div class="logo__detail__designer__leftBox"><img src="img/logo_detail_designer_img.png" alt=""></div>
        <div class="logo__detail__designer__rightBox">
            <div class="logo__detail__designer__name">{{$logo_now->user->username}} さん</div>
            <div class="logo__detail__designer__goodatBox">
            <div class="logo__detail__designer__goodat">得意デザイン：</div>
            <div class="logo__detail__designer__goodatText">スタイリッシュ、かわいい</div>
            </div>
            <div class="logo__detail__designer__text">私の名前はふわふわです。大阪かどこかのデザイン学校にかよっているデザイナーです。作った物の使う機会が無かったロゴをこのサイトに登録させてもらっています。ふわふわふわふわです。ロゴ作るのめんどくさいなぁって思ってます。ああああああああああああああああああああああ。うううううううううううううううううううううう。</div>
        </div>
        </div>
    </div>
    <div class="index__logobox__container">
        <h2>おすすめロゴ</h2>
        <div class="index__logobox__wrap">
            @foreach($logos as $logo)
            <a href="{{route('logos.show',$logo->id)}}">
                <div class="index__logobox">
                    @if(!empty($logo->logoImage->cust_before_path))
                    <img src="/storage/{{ $logo->logoImage->cust_before_path }}" alt="{{ $logo->logoProperty->logo_title }}">
                    @endif
                </div>
                <div class="index__logo__text">
                    <p class="index__logo__text__price">¥{{$logo->logo_price()}}</p>
                    <p class="index__logo__text__by">by {{$logo->user->username}}</p>
                </div>
            </a>
            @endforeach
        </div>
        <div class="logo__detail__otherlogo_morebtn">ロゴをもっと見る</div>
    </div>
    <div class="index_propaganada_container">
        <div class="index_propaganada_item"><img src="img/index_example_prooaganda.png" alt="広告"></div>
        <div class="index_propaganada_item"><img src="img/index_example_prooaganda.png" alt="広告"></div>
    </div>
</main>
@stop

@section('css')
<!-- <link rel="stylesheet" href="{{asset('css/style.css')}}"> -->
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@stop

@section('js')
<script src="{{asset('/js/jquery.js')}}"></script>
<script>
    
</script>
@stop