<?php

namespace App\Console\Commands;

use App\User;
use App\History;
use App\FoodPlan;
use Carbon\Carbon;
use Illuminate\Console\Command;

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
        $this->info('--------------------------');
        $this->info('Saving the old foodplans to their respective owners histories.');

        $users = User::all();
        $bar = $this->output->createProgressBar(count($users));
        foreach ($users as $user) {
            $foodplan = $user->food_plan();
            $history = new History([
                'owner' => $user->id,
                'week' => Carbon::now()->weekOfYear,
                'created_automatically' => true,
            ]);

            foreach (FoodPlan::days() as $day) {
                $history->$day = $foodplan->$day;
            }
            $history->save();
            $bar->advance();
        }
        $this->info(' Finished saving user foodplans of previous week.');
        $this->info('--------------------------');

        return;
    }
}
