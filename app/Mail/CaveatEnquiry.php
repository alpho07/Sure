<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CaveatEnquiry extends Mailable
{
    use Queueable, SerializesModels;
    
   public $caveat, $name,$email,$mobile,$bodyMessage,$cavid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($caveat,$name,$email,$mobile,$bodyMessage,$cavid)
    {   $this->cavid = $cavid;
        $this->caveat = $caveat;
        $this->name = $name;
        $this->email = $email;
        $this->mobile = $mobile;
        $this->bodyMessage = $bodyMessage;
     
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->view('emails.request');
    }
}
