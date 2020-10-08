<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;


class MailSendController extends Controller
{
    //
    public function send(Request $request)
    {
        // $content = $request->all();
        // Mail::to($content->email)->send(new LogoMail($content));

        //メール内容
        $data = [];
        $data['text'] = 'ロゴひろばをご利用いただき、ありがとうございます。';

        Mail::send('email.mail', $data, function($message){
            $message->to('seikashuu@gmail.com','Test')
                    ->subject('ようこそロゴひろば');
        });

        return view('email.send');
    }
}
