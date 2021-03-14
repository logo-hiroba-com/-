@extends('layouts.mastar_mypage_designer')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/logoup.css')}}">
@stop

@section('content')
<div class="mypageD__post__wrap">
    <div class="mypageD__post__box">
        <form action="{{route('logos.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mypageD__post__titleBox">
                <h1>作品投稿</h1>
            </div>
            <div class="mypageD__post__menu1"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu1_on.svg')}}" alt="画像・タイトル"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu2_off.svg')}}" alt="カラー"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu3_off.svg')}}" alt="形"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu4_off.svg')}}" alt="イメージ"></div>
            <div class="mypageD__post__menu2"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu5_off.svg')}}" alt="ジャンル"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu6_off.svg')}}" alt="フォント"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu7_off.svg')}}" alt="値段"><img class="mypageD__post__menuImg" src="{{asset('img/mypageD_post_menu8_off.svg')}}" alt="投稿"></div>
            <div class="mypageD__post__P1">
                <div class="mypageD__post__P1__imageBox">
                    <div class="imageTitle">画像</div>
                        <div class="fileBox"><img id="logo_image_preview" src="{{asset('img/mypageD_post_logoSample.svg')}}" alt="投稿するロゴの画像">
                        <label for="logo_image">画像を選択 </label>
                        <input name="logo_photo" id="logo_image" type="file" accept="image/*">
                    </div>
                </div>
                <div class="mypageD__post__P1__logoTitleBox">
                    <div class="logoTitle">タイトル</div>
                    <input name="logo_name" type="text" placeholder="ロゴのタイトル">
                </div>
            </div>
            <div class="mypageD__post__P2 None">
                <div class="mypageD__post__P2__colorWrap">
                    <div class="colorTitle">色</div>
                    <div class="colorBox">

                    @foreach($logo_colors as $color_row)
                        @foreach($color_row as $logo_color)
                        <input id="colorBox{{$logo_color->color_id}}" type="radio" name="logo_color" value="{{$logo_color->color_id}}" colorname="{{$logo_color->color_name}}" colorcode="{{$logo_color->color_code}}">
                        @endforeach
                    @endforeach

                    @foreach($logo_colors as $color_row)
                        @foreach($color_row as $logo_color)
                        <label class="mypageD__post__P2__color" for="colorBox{{$logo_color->color_id}}" style="background-color: {{$logo_color->color_code}}"></label>
                        @endforeach
                        @foreach($color_row as $logo_color)
                        <div class="imgBox"><img class="colorBox_check colorBox_check{{$logo_color->color_id}}" src="{{asset('img/mypageD_post_colorCheck.svg')}}" alt="チェック"></div>
                        @endforeach
                    @endforeach
                    </div>
                </div>
                <div class="mypageD__post__P2__checked">
                    <div class="checkedTitle">選択済みカラー</div>
                    <div class="checkedColor"></div>
                    <div class="checkedText">無し</div>
                </div>
            </div>
            <div class="mypageD__post__P3 None">
                <div class="mypageD__post__P3__shapeTitle">形</div>
                <div class="mypageD__post__P3__shapeBox1">
                    @foreach($logo_formats as $logo_format)
                    <input id="shape{{$logo_format->format_id}}" type="radio" name="logo_format" value="{{$logo_format->format_id}}">
                    <label for="shape{{$logo_format->format_id}}">{{$logo_format->format_name}}</label>
                    @endforeach
                </div>
                <div class="mypageD__post__P3__shapeBox2">
                    <?php for($i=0;$i<26;$i++): ?>
                    <input id="shape<?= 65+$i ?>" type="radio" name="logo_format" value="<?= 65+$i ?>">
                    <label for="shape<?= 65+$i ?>"><?= chr(65+$i) ?></label>
                    <?php endfor ?>
                </div>
            </div>
            <div class="mypageD__post__P4 None">
                <div class="mypageD__post__P4__imageTitleBox">
                    <div class="imageTitle">イメージ</div>
                    <div class="imageAttention">※2つまで選択可</div>
                </div>
                <div class="mypageD__post__P4__imageBox">
                    @foreach($logo_improves as $logo_improve)
                    <input id="image{{$logo_improve->id}}" type="checkbox" name="logo_improve[]" value="{{$logo_improve->id}}">
                    <label for="image{{$logo_improve->id}}">{{$logo_improve->improve_name}}</label>
                    @endforeach
                </div>
            </div>
            <div class="mypageD__post__P5 None">
                <div class="mypageD__post__P5__genreTitle">ロゴのジャンル</div>
                <div class="mypageD__post__P5__Box1">
                    <div class="mypageD__post__P5__Box1__genreBoxAttention">＊2つまで選択可</div>
                    <div class="mypageD__post__P5__Box1__genreBox">
                        @foreach($logo_type_parents as $logo_type_parent)
                        <div>
                            <input id="genre{{$logo_type_parent->id}}" type="checkbox" name="logo_type[]" value="{{$logo_type_parent->id}}">
                            <label for="genre{{$logo_type_parent->id}}">{{$logo_type_parent->type_name}}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="mypageD__post__P6 None">
                <div class="mypageD__post__P6__Title">フォント選択</div>
                <div class="mypageD__post__P6__Box">
                    <div class="mypageD__post__P6__Box__left">
                    <div><img src="img/logohiroba_logo_nontext.png" alt="投稿するロゴ">
                        <div class="mypageD__post__P6__sampletext" id="mypageD__post__P6__sampletext">ロゴひろば</div>
                    </div>
                    </div>
                    <div class="mypageD__post__P6__Box__right">
                    <div class="changeLanguageBox">
                        <div class="japanese" id="japanese">日本語フォント</div><img src="{{asset('img/mypageD_post_arrow.svg')}}" alt="両向き矢印">
                        <div class="english mypageD__post__P6__nonselect" id="english">英語フォント</div>
                    </div>
                    <div class="inputBox">
                        <input id="font1" type="radio" name="logo_font" value="1">
                        <label class="font_gothic_serif" for="font1"> ゴシック体</label>
                        <input id="font2" type="radio" name="logo_font" value="2">
                        <label class="font_mintyo_san" for="font2">明朝体</label>
                        <input id="font3" type="radio" name="logo_font" value="3">
                        <label class="font_maru_jp" for="font3"> 丸ゴシック</label>
                        <input id="font4" type="radio" name="logo_font" value="4">
                        <label class="font_pop_jp" for="font4">ポップ</label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="mypageD__post__P7 None">
                <div class="mypageD__post__P7__Title">値段</div>
                <div class="mypageD__post__P7__Box">
                    <input id="price3000" type="radio" name="logo_price" value="0">
                    <label class="priceBox" for="price3000">
                    <div class="price">¥3,000</div>
                    <div class="profit__box">
                        <div class="profitText">利益額</div>
                        <div class="profitPrice">¥2,400</div>
                    </div>
                    </label>
                    <input id="price5000" type="radio" name="logo_price" value="1">
                    <label class="priceBox" for="price5000">
                    <div class="price">¥5,000</div>
                    <div class="profit__box">
                        <div class="profitText">利益額</div>
                        <div class="profitPrice">¥4,000</div>
                    </div>
                    </label>
                    <input id="price10000" type="radio" name="logo_price" value="2">
                    <label class="priceBox" for="price10000">
                    <div class="price">¥10,000</div>
                    <div class="profit__box">
                        <div class="profitText">利益額</div>
                        <div class="profitPrice">¥8,000</div>
                    </div>
                    </label>
                </div>
            </div>
            <div class="mypageD__post__P8 None">
            <div class="mypageD__post__P8__Title">確認</div>
            <div class="mypageD__post__P8__Box">
                <div class="logoImgBox">
                    <img class="logoImg" src="{{asset('img/mypageD_post_logoSample.svg')}}" alt="logo">
                    <div class="logosampleBox">
                        <div class="logo_sample"></div>
                        <div class="logo_sample"></div>
                        <div class="logo_sample"></div>
                        <div class="logo_sample"></div>
                        <div class="logo_sample"></div>
                        <div class="logo_sample"></div>
                    </div>
                </div>
                <div class="theme">タイトル
                <div class="text">ロゴのタイトル</div>
                </div>
                <div class="theme">色
                    <div class="colorBox">
                        <div class="color"></div>
                        <div class="colortext">青</div>
                    </div>
                </div>
                <div class="theme">形
                    <div class="text">ロゴの形</div>
                </div>
                <div class="theme">イメージ
                    <div class="text">ロゴのイメージ</div>
                </div>
                <div class="theme">ジャンル
                    <div class="text">ロゴのジャンル</div>
                </div>
                <div class="theme">フォント
                    <div class="text">フォントの種類</div>
                </div>
                <div class="theme">値段
                    <div class="text">ロゴの値段</div>
                </div>
            </div>
            </div>
            <div class="mypageD__post__next">次へ</div>
            <button class="mypageD__post__postBt" type="submit">投稿</button>
        </form>
    </div>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/mypageD_post.js')}}"></script>
<script>

    // ===次へボタンの機能を===
    let pageNum = 1;

    $('.mypageD__post__next').on('click', function () {
        if (pageNum < 9) {
            // ページ変更
            $(`.mypageD__post__P${pageNum}`).addClass('None');
            $(`.mypageD__post__P${pageNum + 1}`).removeClass('None');

            // メニューバー変更
            $('.mypageD__post__menuImg')[pageNum - 1].src = `{{asset('img/mypageD_post_menu${pageNum}_off.svg')}}`
            $('.mypageD__post__menuImg')[pageNum].src = `{{asset('img/mypageD_post_menu${pageNum + 1}_on.svg')}}`


            pageNum++;
        }
    });
</script>
@stop