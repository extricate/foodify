<?php

namespace App\Console;

use App\Events\NewWeek;
use App\Events\NewMonth;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\CLIGenerateFoodplans::class,
        Commands\GenerateAdminReport::class,
        Commands\SaveFoodplanToHistory::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            event(new NewWeek);
        })->weekly()->sundays()->at('23:00');

        $schedule->call(function () {
            event(new NewMonth);
        })->monthly()->sundays()->at('23:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
