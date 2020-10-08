
@extends('layouts.master_logo')

@section('title', '新規登録')

@section('content_header')
    <h1>新規登録</h1>
@stop

@section('styles')
  <link rel="stylesheet" href="{{asset('css/logo_login.css')}}">
@stop

@section('content')
<!-- <div class="container"> -->
    <div class="registered">
        <div class="registered__ttl">登録完了</div>

        <div class="registered__content">
            <p>{{ $username }} 様</p>
            <p>この度、ロゴひろばをご登録いただき、誠にありがとうございます。</p>
            <!-- <p>
                ご本人様確認のため、登録していただいたメールアドレスに、<br>
                ご案内のメールが届きます。
            </p>
            <p>
                そちらに記載されているURLにアクセスし、<br>
                アカウント登録を完了させてください。
            </p> -->
        </div>
    </div>
<!-- </div> -->
@endsection