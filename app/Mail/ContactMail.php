<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
     public $msg;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $msg = $this->msg;
        return $this->markdown('emails.contact', compact('msg'));
    }
}
