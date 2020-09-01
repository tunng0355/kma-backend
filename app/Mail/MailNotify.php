<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $msg;
    PUBLIC $sub;
    public function __construct($message, $sub)
    {
        $this->msg = $message;
        $this->sub = $sub;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   $msg = $this->msg;
        $this->markdown('email', compact('msg'))
             ->from('appdu.hotro@gamil.com', 'App Du')->subject($this->sub);

    }
}
