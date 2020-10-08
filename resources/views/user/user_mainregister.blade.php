
@extends('adminlte::page')

@section('title', 'デザイナー情報登録')

@section('content_header')
    <h1>デザイナー情報登録</h1>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">デザイナー情報登録</div>

                    @isset($message)
                        <div class="card-body">
                            {{$message}}
                        </div>
                    @endisset

                    @empty($message)
                        <form method="POST" action="{{ route('designermain') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row my-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right">氏名（ニックネーム）</label>
                                <input type="text" class="col-md-5" name="name" value="">
                            </div>
                            <div class="form-group row my-2">
                                <label for="intro" class="col-md-4 col-form-label text-md-right">自己紹介</label>
                                <textarea class="col-md-6" name="intro"></textarea>
                            </div>
                            <div class="form-group row my-2">
                                <label for="intro" class="col-md-4 col-form-label text-md-right">アイコン</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
                                <div class="iconArea">
                                    <div class="iconItem">
                                        <label for="file_up" class="thumbView">
                                        <img src="" alt=""> 
                                        </label>
                                        <input id="file_up" type="file" name="file" vlaue="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row my-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        確認画面へ
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endempty

                </div>
            </div>
        </div>
        
    </div>
@endsection