<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $mailingUser;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        // always delay 15 minutes
        $this->delay(15);
        $this->mailingUser = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.user.welcome')->to($this->mailingUser->email)->subject('Welcome to Foodify!');
    }
}
