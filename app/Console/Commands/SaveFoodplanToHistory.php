<?php

namespace App\Console\Commands;

use App\User;
use App\History;
use App\FoodPlan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Listeners\SaveFoodplansToHistory;

/**
 * Class SaveFoodplanToHistory
 * @package App\Console\Commands
 */
class SaveFoodplanToHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foodify:save-foodplans';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save the foodplans of all users or the specified users. Defaults to all users for the GenerateFoodplans command.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * Save all existing foodplans to the history of all users.
         */
        $this->info('--------------------------');
        $this->info('Firing the Save Foodplans event.');
        event(new SaveFoodplansToHistory);
        $this->info('Event was started. Foodplans are being saved to the database as new history objects.');
        $this->info('--------------------------');

        return;
    }
}
