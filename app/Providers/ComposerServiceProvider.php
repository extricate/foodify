<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            '*',
            'App\Http\ViewComposers\UserComposer'
        );

        /*view()->composer(
            '*',
            'App\Http\ViewComposers\WeekPlanComposer'
        );*/
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
