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

Route::get('/home', 'HomeController@index');

// Route::post('/', 'UserController@sign_check')->name('usercheck');       
//デザイナー登録のはじめ画面
// Route::group(['prefix' => 'logo'], function() {
    Route::group(['middleware' => 'guest'], function(){
        Route::get('/userlogin','UserController@login_view')->name('userlogin');
        Route::get('/usersign','UserController@sign_view')->name('usersign');

        Route::post('/userlogin', 'UserController@login_check')->name('userlogin');

        Route::post('/usercheck', 'UserController@sign_check')->name('usercheck');       
    });
// });
// Route::resource('logos','LogoController');

// Route::group(['prefix' => 'logo'], function() {
    Route::group(['middleware'=>'auth'],function() {
        // Route::get('/logos/{search}', 'UserController@search');

        Route::get('/sendmail', 'MailSendController@send');

        //トークンをチェックする
        Route::get('register/verify/{token}','UserController@show_form');

        //気になるロゴ
        Route::resource('logos','LogoController');

        //気になる
        Route::get('/logolike','LogoController@logo_like')->name('logolike');

        //Session
        Route::get('/sessiondata', function(){
            return session()->all();
        });
        
    });
// });

Route::resource('logos','LogoController',['only'=>['index','show']]);
Route::get('/userlogout', 'UserController@get_logout')->name('userlogout');

Route::post('/search','LogoController@logo_search');