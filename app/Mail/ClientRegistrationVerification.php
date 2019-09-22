<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientRegistrationVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $profile;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct($user, $profile, $password)
    {
        $this->user = $user;
        $this->profile = $profile;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('mails.register');
                    
    }
}
