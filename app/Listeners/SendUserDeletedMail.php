<?php

namespace App\Listeners;

use App\Mail\SendDeletedMail;
use App\Events\UserDeletedAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserDeletedMail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserDeletedAccount  $event
     * @return void
     */
    public function handle(UserDeletedAccount $event)
    {
        $user = $event->user;
        Mail::send(new SendDeletedMail($user));
    }
}
