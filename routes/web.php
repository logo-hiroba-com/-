<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/', 'LogoController@index_show');

// Route::post('/', 'UserController@sign_check')->name('usercheck');       
//デザイナー登録のはじめ画面
// Route::group(['prefix' => 'logo'], function() {
    Route::group(['middleware'=>'guest'], function(){
        Route::get('/userlogin','UserController@login_view')->name('userlogin');
        Route::get('/usersign','UserController@sign_view')->name('usersign');
        Route::get('/sendmail', 'MailSendController@send');
        Route::get('register/verify/{token}','UserController@show_form');
        Route::post('/logincheck', 'UserController@login_check')->name('logincheck');
        Route::post('/usercheck', 'UserController@sign_check')->name('usercheck');       
    });
// });
// Route::resource('logos','LogoController');
Route::resource('download', 'downloadController');
// Route::resource('setting', 'SettingController');

// Route::group(['prefix' => 'logo'], function() {
    Route::group(['middleware'=>'auth'],function() {
        // Route::get('/logos/{search}', 'UserController@search');

        //ダウンロード
        Route::resource('download', 'downloadController');

        //マイページ
        Route::resource('setting', 'SettingController');

        //気になるロゴ
        Route::resource('logos','LogoController');

        //気になる
        Route::get('/logolike','LogoController@logo_like')->name('logolike');

        //Session
        Route::get('/sessiondata', function(){
            return session()->all();
        });

        //ユーザーの切り替え
        Route::get('change', 'SettingController@type_change')->name('change');
        
        //デザインのプロフィールへ
        Route::resource('setdesigner', 'SetdesignerController');
        
        //いいね一覧
        Route::get('likelist', 'SettingController@like_list')->name('likelist');
        //購入一覧
        Route::get('buylist', 'SettingController@buy_list')->name('buylist');

        //お知らせ
        Route::get('setnews', 'SettingController@news_list')->name('setnews');
       
        // Route::post('/tasks/store', 'TasksController@store')->name('tasks.store');
        
    });
// });

Route::resource('logos','LogoController',['only'=>['index','show']]);
Route::get('/userlogout', 'UserController@get_logout')->name('userlogout');

Route::get('search','LogoController@logo_search');