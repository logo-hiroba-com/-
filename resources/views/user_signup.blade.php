@extends('layouts.master_logo')

@section('title', 'ユーザー登録')

@section('content_header')
    <h1>ユーザー登録</h1>
@stop
 
@section('content')
  <div class="row">
  <form action="{{ route('user.signup') }}" method="post" class="form-horizontal" style="margin-top: 50px;">
  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputName">氏名</label>
  <div class="col-sm-9">
  <input type="text" name="name" class="form-control" id="InputName" placeholder="氏名">
  <!--/.col-sm-10---></div>
  <!--/form-group--></div>
 
  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputEmail">メール・アドレス</label>
  <div class="col-sm-9">
  <input type="email" name="email" class="form-control" id="InputEmail" placeholder="メール・アドレス">
  </div>
  <!--/form-group--></div>
 
  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputPassword">パスワード</label>
  <div class="col-sm-9">
  <input type="password" name="password" class="form-control" id="InputPassword" placeholder="パスワード">
  </div>
  <!--/form-group--></div>
 
  <div class="form-group">
  <label class="col-sm-3 control-label" for="area1">住所（エリア）</label>
  <div class="col-sm-9">
  <select name="area" data-toggle="select" class="form-control select select-default" id="area1">
  <option>北海道</option>
  <option>東北</option>
  <option>関東</option>
  <option>中部</option>
  <option>近畿</option>
  <option>中国</option>
  <option>四国</option>
  <option>九州</option>
  <option>沖縄</option>
  </select>
  </div>
  <!--/form-group--></div>
 
  <div class="form-group">
  <label class="col-sm-3 control-label" for="InputSelect">プログラム経験年数</label>
  <div class="col-sm-9">
  <div class="form-group form-group-sm">
  <label class="radio" for="ex1">
  <input type="radio" name="experience" data-toggle="radio" value="1年未満" id="ex1" required checked>
  1年未満
  </label>
  <label class="radio" for="ex2">
  <input type="radio" name="experience" data-toggle="radio" value=1年以上～3年未満" id="ex2" required>
  1年以上～3年未満
  </label>
  <label class="radio" for="ex3">
  <input type="radio" name="experience" data-toggle="radio" value="3年以上" id="ex3" required>
  3年以上
  </label>
  </div>
  </div>
  <!--/form-group--></div>
 
  <div class="form-group">
  <div class="col-sm-offset-3 col-sm-9">
  <button type="submit" class="btn btn-primary btn-block">新規登録</button>
  </div>
  <!--/form-group--></div>
  {{ csrf_field() }}
  </form>
  </div>
@endsection