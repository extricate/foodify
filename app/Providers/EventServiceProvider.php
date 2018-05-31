<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\NewMonth' => [
            'App\Listeners\GenerateAdminReport',
        ],
        'App\Events\NewWeek' => [
            'App\Listeners\SaveFoodplansToHistory',
        ],
        'App\Events\FoodplansSavedToHistory' => [
            'App\Listeners\GenerateFoodplans',
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\SendUserWelcomeMail',
        ],
        'App\Events\UserDeletedAccount' => [
            'App\Listeners\SendUserDeletedMail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
