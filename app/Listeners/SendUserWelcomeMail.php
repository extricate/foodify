<?php

namespace App\Listeners;

use App\Mail\SendWelcomeMail;
use App\Events\UserRegistered;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;



class SendUserWelcomeMail
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $registeredUser = $event->registeredUser;
        Mail::send(new SendWelcomeMail($registeredUser));
    }
}
