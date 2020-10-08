<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LogoMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $content;

    public function __construct()
    {
        //
        $content = ['name' => 'fuga', 'mail' => 'fuga@example.com'];
        // $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('logo.hiroba@gmail.com')
            ->subject('ようこそロゴひろば')
            ->view('email.mail')
            ->with(['content'=>$this->content]);
    }
}
