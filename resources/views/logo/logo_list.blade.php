@extends('layouts.master_logo')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
@stop

@section('content')

<main>
    <div class="header__img"></div>
    <div class="index__search__wrap">
      <div class="index__search">
        <div class="index__search__left">
          <div class="index__search__keyword">
            <p>キーワードから探す</p>
            <div class="index__search__keyword__box">
              <input class="input__text" type="text" name="index__search" placeholder="キーワードを入力">
              <input class="input__search__btn" type="submit" value="">
            </div>
          </div>
          <div class="index__search__price">
            <p>価格から探す</p>
            <div class="index__search__price__box">
              <input type="checkbox" name="price" status="0" value="0">¥3,000
              <input type="checkbox" name="price" status="0" value="1">¥5,000
              <input type="checkbox" name="price" status="0" value="2">¥10,000
            </div>
          </div>
        </div>
        <div class="index__search__right">
          <div class="index__search__navi">
            <ul>
              <li>カラー<span class="optionNum"></span></li>
              <li>形<span class="optionNum"></span></li>
              <li class="listChoose">アルファベット<span class="optionNum"></span></li>
              <li>イメージ<span class="optionNum"></span></li>
              <li>ジャンル<span class="optionNum"></span></li>
            </ul>
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_colors as $logo_color)
            <div>
              <label><input type="checkbox" genre="1" status="0" name="color" value="{{$logo_color->color_id}}">{{$logo_color->color_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_formats as $logo_format)
            <div>
              <label><input type="checkbox" genre="2" status="0" name="format" value="{{$logo_format->format_id}}">{{$logo_format->format_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListView">
            <?php for($i=0;$i<26;$i++): ?>
            <div>
              <label><input type="checkbox" genre="3" status="0" name="format" value="<?= 65+$i ?>"><?= chr(65+$i) ?></label>
            </div>
            <?php endfor ?>
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_improves as $logo_improve)
            <div>
              <label><input type="checkbox" genre="4" status="0" name="improve" value="{{$logo_improve->id}}">{{$logo_improve->improve_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_type_parents as $logo_type_parent)
            <div>
              <label><input type="checkbox" genre="5" status="0" name="type_parent" value="{{$logo_type_parent->type_parent_id}}">{{$logo_type_parent->type_name}}</label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="index__logobar__box">
      <div class="index__logobar__num__box">
        <div class="index__logobar__flexbox1">
          <div class="index__logobar__num1">10,152</div>
          <div class="index__logobar__text1">件中</div>
          <div class="index__logobar__num2">1 - 60</div>
          <div class="index__logobar__text1">表示</div>
        </div>
        <div class="index__logobar__display">
          <input class="index__logobar__display__input" id="index__logobar__display__input" type="checkbox" name="logo__display">売り切れたロゴを非表示
        </div>
      </div>
      <div class="index__logobar__rine__box">
        <div class="index__logobar__rine__text">並び替え</div>
        <select class="index__logobar__rine__select" id="index__logobar__rine__select" name="rine">
          <option value="Recommended">おすすめ</option>
          <option value="new">新着順</option>
        </select>
      </div>
    </div>
    <div class="index__logobox__container">
        <!-- <a href="logo_detail.html">
        <div class="index__logobox"><img src="img_logo/ume.png" alt=""></div>
        <div class="index__logo__text">
          <p class="index__logo__text__price">¥5,000</p>
          <p class="index__logo__text__by">by Ryusei</p>
        </div></a><a href="#"> -->
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
    </div>
    <!-- <ul class="pagenatoin__box">
      <li class="pagenatoin__back">前へ</li>
      <li class="pagenatoin__num">1</li>
      <li class="pagenatoin__num">2</li>
      <li class="pagenatoin__num">3</li>
      <li class="pagenatoin__num">4</li>
      <li class="pagination__next">次へ</li>
    </ul> -->
    <div class="index_propaganada_container">
      <div class="index_propaganada_item"><img src="{{asset('img/index_example_prooaganda.png')}}" alt="広告"></div>
      <div class="index_propaganada_item"><img src="{{asset('img/index_example_prooaganda.png')}}" alt="広告"></div>
    </div>
  </main>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/logo_search.js')}}"></script>
@stop