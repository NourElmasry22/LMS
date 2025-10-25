<?php

namespace Modules\Users\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    /**
     * Create a new message instance.
     */
    public function __construct() {
    
      
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
      return $this->subject('🎉 Welcome to Career180!')
                    ->view('users::mails.welcome');
    }
}
