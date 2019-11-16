<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContuctMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message_to_send= 0;
   
    public function __construct($name,$massage)
    {
        $this->name= $name;
        $this->message_to_send= $massage;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        $name = $this->name;
        $message_to_send=$this->message_to_send;
        return $this->view('mail',compact('name','message_to_send'));
    }
}
