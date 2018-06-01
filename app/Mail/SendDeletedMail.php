<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendDeletedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $deletedUser;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->deletedUser = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this ->markdown('emails.user.self-deleted')->with([$this->deletedUser])->to($this->deletedUser->email)->subject('Confirmation of account deletion');
    }
}
