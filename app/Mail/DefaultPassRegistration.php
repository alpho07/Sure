<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DefaultPassRegistration extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->User = $user;
           //dd($user);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.defaultpass')
        ->with([
            'name' => $this->User->name,
            'email' => $this->User->email,
            'token' => $this->User->confirmation_token  
        ])->subject('Your Hakikisha account has been created.');
    }
}
