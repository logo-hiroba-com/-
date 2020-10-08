<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    //デザイナー情報を渡す
    protected $designer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($designer)
    {
        $this->designer = $designer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('【ロゴひろば】仮登録が完了しました。')
            ->view('email.pre_register')
            ->with(['token' => $this->designer->email_verify_token]);
    }
}
