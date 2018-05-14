<?php

namespace App\Listeners;

use App\Events\NewMonth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateAdminReport
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
     * @param  NewMonth  $event
     * @return void
     */
    public function handle(NewMonth $event)
    {
        //
    }
}
