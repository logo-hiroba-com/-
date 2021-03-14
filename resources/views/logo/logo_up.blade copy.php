@extends('layouts.master_logo')

@section('title', 'ロゴ一覧')

@section('content_header')
    <h1>ロゴ一覧</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/logo_list.css')}}">
@stop

@section('content')
<div class="logoUp">
    <form class="logoUp__upArea" method="post" action="{{route('logos.store')}}" enctype="multipart/form-data">
        @csrf
        <h2 class="logoUp__upArea__title">作品投稿</h2>
        <ul class="logoUp__upArea__stepMenu">
            <li class="now">画像・タイトル</li>
            <li>カラー</li>
            <li>形</li>
            <li>イメージ</li>
            <li>ジャンル</li>
            <!-- <li>フォント</li> -->
            <li>値段</li>
            <li>投稿</li>
        </ul>

        <div class="logoUp__upArea__stepArea">
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">ロゴ画像</p>
                <div id="photoArea">
                    <input class="hidden" id="inputFile" name="logo_photo" type="file" value="">
                    <label for="inputFile">
                        <p class="imageView"><span class="startWord">画像</span><img class="hidden" id="photoView" src="" alt=""></p>
                    </label>
                </div>
            </div>
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">タイトル</p>
                <p class="content titleInput"><input name="logo_name" type="text"></p>
            </div>

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">コンセプト</p>
                <p class="content"><textarea name="logo_desc" type="text"></textarea>
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">メインカラー</p>
                <ul class="colorArea">
                    @foreach($logo_colors as $logo_color)
                    <li id="{{$logo_color->color_id}}" name="{{$logo_color->color_name}}" style="background: {{$logo_color->color_code}}"></li>
                    @endforeach
                </ul>

                <div class="colorSelectArea"><p>選択済みカラー</p><p class="color"></p><p class="colorName"></p></div>
                <input class="colorInput" name="logo_color" type="hidden" value="">
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">形</p>
                <ul class="formatArea">
                    @foreach($logo_formats as $logo_format)
                    <li id="{{$logo_format->format_id}}">{{$logo_format->format_name}}</li>
                    @endforeach
                </ul>
                <ul class="formatArea">
                    <?php for($i=0;$i<26;$i++): ?>
                    <li id="<?= 65+$i ?>">
                        <?= chr(65+$i) ?>
                    </li>
                    <?php endfor ?>
                </ul>
                <input class="formatInput" name="logo_format" type="hidden" value="">
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">イメージ</p>
                <ul class="improveArea">
                    @foreach($logo_improves as $logo_improve)
                    <li id="{{$logo_improve->id}}">{{$logo_improve->improve_name}}</li>
                    @endforeach
                </ul>
                <input class="improveInput" name="logo_improve" type="hidden" value="item[]">
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">ジャンル</p>
                <ul class="typeArea">
                    @foreach($logo_type_parents as $logo_type_parent)
                    <li id="{{$logo_type_parent->id}}" parent_id="{{$logo_type_parent->type_parent_id}}" typename="{{$logo_type_parent->type_name}}"><p class="checkbox"><span></span></p><p class="typename">{{$logo_type_parent->type_name}}</p></li>
                    @endforeach
                </ul>
                <ul class="typeChildArea">
                    @foreach($logo_types as $logo_type)
                    <li class="hidden" id="{{$logo_type->id}}" parent_id="{{$logo_type->type_parent_id}}" typename="{{$logo_type->type_name}}">{{$logo_type->type_name}}</li>
                    @endforeach
                </ul>
                <input class="typeInput" name="logo_type" type="hidden" value="item[]">
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">    
                <p class="contentTitle">値段</p>
                <ul class="priceArea">
                    <li id="0">¥3000円<br><span>利益額 ¥2400</span></li>
                    <li id="1">¥5000円<br><span>利益額 ¥4000</span></li>
                    <li id="2">¥10000円<br><span>利益額 ¥8000</span></li>
                </ul>
                <input class="priceInput" name="logo_price" type="hidden" value="">
            </div>
        </div>

        <div class="logoUp__upArea__stepArea hidden">
            <div class="logoUp__upArea__stepArea__contentArea">    
                <figure class="contentImg"><img src="" alt=""></figure>
            </div>
            
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">タイトル</p>
                <p class="contentText title">　　</p>
            </div>

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">コンセプト</p>
                <p class="contentText consept">　　</p>
            </div>

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">カラー</p>
                <div class="contentColor"><p class="color"></p><p class="colorName"></p></div>
            </div>
            
            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">形</p>
                <p class="contentText format">　　</p>
            </div>

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">イメージ</p>
                <p class="contentText improve">　　</p>
            </div>

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">ジャンル</p>
                <p class="contentText type">　　</p>
            </div>

            <!-- <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">フォント</p>
                <p class="contentText font">　　</p>
            </div> -->

            <div class="logoUp__upArea__stepArea__contentArea">
                <p class="contentTitle">値段</p>
                <p class="contentText price">　　</p>
            </div>
                
            <div class="logoUp__upArea__stepArea__contentArea"> 
                <button class="sendBtn" type="submit">ロゴを投稿</button>
            </div>
        </div>

        <div class="logoUp__upArea__nextBtn">
            <button class="nextBtn" type="button">次へ</button>
        </div>
    </form>
</div>
@stop

@section('scripts')
<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/logo_list.js')}}"></script>
@stop