<?php

namespace App\Http\Controllers;

use App\User;
use App\Designer;
use App\Logo;
use App\logoImage;
use App\logoProperty;
use App\logoImprove;
use App\logoColor;
use App\logoFormat;
use App\logoType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// use Illuminate\Contracts\Auth\Authenticatable;
// use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\PendingMail;

use Auth;
use Carbon\Carbon;

class UserController extends Controller
{
    public function login_view()
    {

        return view('user.user_login');
    }

    public function sign_view()
    {
        //登録画面の表示
        // $data = session()->get('test');
        // return view('user.user_register')->with('data',$data);
        return view('user.user_register');
    }

    public function sign_check(Request $request)
    {
        //登録データのチェック
        //
        //errorメッセージ
        // 1:  
        // 2:
        $request->validate(
            [
                'name' => 'required|min: 3|max: 60',
                'email' => 'required|min: 6|max: 255',
                'password' => 'required|min: 6'
            ],
            [
                'name.required' => 'メールアドレスを入力してください。',
                'email.required' => 'メールアドレスを入力してください。',
                'passowrd.required' => 'パスワードを入力してください。',
                'passowrd.max' => 'パスワードは英数6文字以上、12文字以下にしてください。'
            ]
        );

        $username = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $repassword = $request->input('password_confirmation');
        $usertype = $request->input('usertype');
        
        $error;

        if($password == $repassword){
            $email_check = User::where('mail',"$email")->first();
            if(!isset($email_check)){

                $user = User::create([
                    'username' => $username,
                    'mail' => $email,
                    'password' => Hash::make($password),
                    'email_verify_token' => base64_encode($email),
                    'user_type' => $usertype
                ]);
                $user->save();
                
                view('user.user_registered')->with('username',$username);

                $send_email = new EmailVerification($user);
                Mail::to($email)->send($send_email);
            }else{
                $error = 1;
                return view('user.user_register')->with('error_num',$error)->with('email',$email);
            }
        }else{
            $error = 1;
            return view('user.user_register')->with('error_num',$error)->with('email',$email);
        }
    }

    //トークン合っているかどうかのチェック
    public function show_form($email_token)
    {
        if(!User::where('email_verify_token',$email_token)->exists()){
            //無効
            return view('user.user_mainregister')->with('message','無効なトークンです。');
        }else{
            
            $user_datas = User::where('email_verify_token',$email_token)->first();
            $status_now = $user_datas->status;

            if($status_now == 0){
                $user_datas->status = config('const.USER_STATUS.REGISTER');
                //Carbonは日付を自動的に生成するもの
                $user_datas->email_verified_at = Carbon::now();
                // $user_id = $user->id;
                $user_datas->save();

                $user_id = $user_datas->id;
                $username = $user_datas->username;
    
                $designer = Designer::create([
                    'user_id' => $user_id,
                    'username' => $username
                ]);
                $designer->save();
            }

            Auth::login($user_datas);
            $user_type = $user_datas->user_type;
            if($user_type == 1){
                session()->put(['user_datas'=>$user_datas]);
                return redirect()->route('logos.index');
            }else{
                session()->put(['user_datas'=>$user_datas]);
                return redirect()->route('setting.index');
            }
        }//if
    }

    //ログイン
    public function login_check(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|min: 6|max: 255',
                'password' => 'required|min: 6|max: 12'
            ]
        );

        $mail = $request->input('email');
        // $password = Hash::make($request->input('password'));
        $password = $request->input('password');

        // dd($password);

        // dd(Auth::attempt(['mail' => $mail, 'password' => $password]));

        if(Auth::attempt(['mail' => $mail, 'password' => $password, 'status' => 1])){
            // print_r();
            // dd($mail);
            $user_datas = User::where('mail',$mail)->first();
            // dd($user_datas);
            // return redirect()->route('logos.index')->with('user_datas',$user_datas);
            
            if($user_datas->user_type == 1){
                session()->put(['user_datas'=>$user_datas]);
                return redirect()->route('logos.index');
            }else{
                session()->put(['user_datas'=>$user_datas]);
                return redirect()->route('setting.index');
            }
            // $logos = Logo::get();
            // $logo_formats = logoFormat::get();

            // return redirect('logos')->with('test','テスト')->with('logos',$logos)->with('logo_formats',$logo_formats);

        }else{
            // dd($password);
            return redirect()->back();
            // return redirect()->route('logos.index');
        }
    }


    //ログアウト
    public function get_logout()
    {
        Auth::logout();
        session()->forget('user_datas');

        return redirect()->route('userlogin');
    }
}
