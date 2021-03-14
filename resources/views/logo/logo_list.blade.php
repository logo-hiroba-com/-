@extends('layouts.master_logo_index')

@section('title', 'ロゴ一覧')

@section('styles')
  <link rel="stylesheet" href="{{asset('css/search.css')}}">
@stop

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('content')
  <main id="pageStart">
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
              <input id="price1" type="checkbox" name="price" value="0" status="0">
              <label for="price1">¥3,000</label>
              <input id="price2" type="checkbox" name="price" value="1" status="0">
              <label for="price2">¥5,000</label>
              <input id="price3" type="checkbox" name="price" value="2" status="0">
              <label for="price3">¥10,000</label>
            </div>
          </div>
        </div>
        <div class="index__search__right">
          <div class="index__search__navi">
            <ul>
              <!-- <li>カラー<span class="optionNum"></span></li>
              <li>形<span class="optionNum"></span></li>
              <li class="listChoose">アルファベット<span class="optionNum"></span></li>
              <li>イメージ<span class="optionNum"></span></li>
              <li>ジャンル<span class="optionNum"></span></li> -->
              <li>カラー
                <span class="optionNum"></span>
              </li>
              <li>形
                <span class="optionNum"></span>
              </li>
              <li class="listChoose">アルファベット
                <span class="optionNum"></span>
              </li>
              <li>イメージ
                <span class="optionNum"></span>
              </li>
              <li>ジャンル
                <span class="optionNum"></span>
              </li>
            </ul>
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_colors as $key=>$logo_color)
            <div>
              <input id="sColor{{$key+1}}" type="checkbox" genre="1" status="0" name="color" value="{{$logo_color->color_id}}">
              <label for="sColor{{$key+1}}">{{$logo_color->color_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_formats as $key=>$logo_format)
            <div>
              <input id="sFormat{{$key+1}}" type="checkbox" genre="2" status="0" name="format" value="{{$logo_format->format_id}}">
              <label for="sFormat{{$key+1}}">{{$logo_format->format_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListView">
            <?php for($i=0;$i<26;$i++): ?>
            <div>
              <input id="sAlphabet{{$i+101}}" type="checkbox" genre="3" status="0" name="format" value="<?= 65+$i ?>">
              <label for="sAlphabet{{$i+101}}"><?= chr(65+$i) ?></label>
            </div>
            <?php endfor ?>
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_improves as $key=>$logo_improve)
            <div>
              <input id="sImprove{{$key+1}}" type="checkbox" genre="4" status="0" name="improve" value="{{$logo_improve->id}}">
              <label for="sImprove{{$key+1}}">{{$logo_improve->improve_name}}</label>
            </div>
            @endforeach
          </div>
          <div class="index__search__navi__box searchListHidden">
            @foreach($logo_type_parents as $key=>$logo_type_parent)
            <div>
              <input id="sType{{$key+1}}" type="checkbox" genre="5" status="0" name="type_parent" value="{{$logo_type_parent->type_parent_id}}">
              <label for="sType{{$key+1}}">{{$logo_type_parent->type_name}}</label>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div class="index__logobar__box">
      <div class="index__logobar__num__box">
        <div class="index__logobar__flexbox1">
          <div class="index__logobar__num1">0</div>
          <div class="index__logobar__text1">件中</div>
          <div class="index__logobar__num2"><span class="startNum">1</span> - <span class="endNum">60</span></div>
          <div class="index__logobar__text1">表示</div>
        </div>
        <div class="index__logobar__display">
          <input class="index__logobar__display__input" id="soldout" type="checkbox" name="logo__display">
          <label for="soldout">売り切れたロゴを非表示</label>
        </div>
      </div>
      <div class="index__logobar__rine__box">
        <div class="index__logobar__rine__text">並び替え</div>
        <select class="index__logobar__rine__select" id="index__logobar__rine__select" name="rine">
          <option value="1">おすすめ</option>
          <option value="2">新着順</option>
        </select>
      </div>
    </div>
  
    <div class="index__logobox__container">

    </div>

    <!-- 修正：linkを消す -->
    <div class="pagenatoin__box">
      <div class="pagenatoin__back flex">
        <i class="fas fa-chevron-left"></i>
        <div class="pagenatoin__back__text">前へ</div>
      </div>
      <ul class="pagenatoin__pagebox">
      </ul>
      <!-- <li class="pagenatoin__num pagenation__now">
        <div>1</div>
      </li> -->
      <!-- <li class="pagenatoin__num">
        <div>2</div>
      </li>
      <li class="pagenatoin__num">
        <div>3</div>
      </li>
      <li class="pagenatoin__reader">…</li>
      <li class="pagenatoin__num">
        <div>4</div>
      </li>
      <li class="pagenatoin__num">
        <div>5</div> -->
      <!-- </li> -->
      <div class="pagination__next flex">
        <div class="pagination__next__text">次へ</div>
        <i class="fas fa-chevron-right"></i>
      </div>
    </div>
    <div class="index_propaganada_container">
      <div class="index_propaganada_item"><img src="{{asset('img/index_prooaganda_a.png')}}" alt="広告"></div>
      <div class="index_propaganada_item"><img src="{{asset('img/index_prooaganda_b.png')}}" alt="広告"></div>
    </div>
  </main>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<!-- <script src="{{asset('/js/like.js')}}"></script> -->
<script src="{{asset('/js/logo_search.js')}}"></script>
<script>
  // window.onpopstate = function(e) { alert(e.state); }
</script>
@stop