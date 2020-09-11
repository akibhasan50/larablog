<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fromemail,$reply)
    {
        // $this->to =$toemail;
         $this->form =$fromemail;
        $this->rep =$reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@example.com')->view('mail.Reply')->with(['mail'=>$this->form,'reply'=>$this->rep]);
    }
}
