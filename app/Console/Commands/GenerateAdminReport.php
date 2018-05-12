<?php

namespace App\Console\Commands;

use App\Recipe;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateAdminReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'foodify:admin-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the weekly admin report';

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
     * Generate the admin report for this week.
     *
     * @return mixed
     */
    public function handle()
    {
        $currentDate = Carbon::now();
        $previousWeek = $currentDate->subDays($currentDate->dayOfWeek)->subWeek();

        // totals
        $recipeCount = Recipe::count();
        $userCount = User::count();

        // get difference between previous week report
        $differenceRecipeCreated = Recipe::whereBetween('created_at', array($currentDate, $previousWeek))->count();
        $differenceRecipeUpdated = Recipe::whereBetween('updated_at', array($currentDate, $previousWeek))->count();

        $userCountDifference = User::whereBetween('created_at', array($currentDate, $previousWeek))->count();

        $this->info('Registered users: ' . $userCount);
        $this->info('New users since this week: ' . $userCountDifference);
        $this->info('Difference in recipes that have been updated: ' . $differenceRecipeUpdated);
        $this->info('Difference in recipes that have been created: ' . $differenceRecipeCreated);

        return;
    }
}
