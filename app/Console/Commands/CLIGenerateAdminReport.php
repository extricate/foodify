<?php

namespace App\Console\Commands;

use App\AdminReport;
use App\Comment;
use App\User;
use App\Recipe;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CLIGenerateAdminReport extends Command
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
    protected $description = 'Generate the monthly admin report';

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
        /**
         * There is some code duplication between this console command and the GenerateAdminReport
         * listener. This is due to the fact that there will be more complex logic in this class
         * in the near future, to allow for specificity and flexibility of the report duration.
         *
         * TO-DO.
         */
        // carbon logic for today and a month ago
        $now = Carbon::now();
        $from = $now->subMonth();
        // adding a day to prevent missing rows due to different date time configurations
        $till = Carbon::now()->addDay();

        $monthlyDifference = [$from, $till];

        // totals
        $recipeCount = Recipe::count();
        $userCount = User::count();
        $commentCount = Comment::count();

        // get difference between previous week report
        $differenceRecipeCreated = Recipe::whereBetween('created_at', $monthlyDifference)->count();
        $differenceRecipeUpdated = Recipe::whereBetween('updated_at', $monthlyDifference)->count();
        $userCountDifference = User::whereBetween('created_at', $monthlyDifference)->count();
        $commentCountDifference = Comment::whereBetween('created_at', $monthlyDifference)->count();

        // cli feedback
        $this->info('--------------------------');

        $this->info('Admin report ' . $from . ' till ' .  $till);

        $this->info('--------------------------');

        $this->info('Total registered users: ' . $userCount);
        $this->info('New users since this month: ' . $userCountDifference);

        $this->info('--------------------------');

        $this->info('Total amount of recipes: ' . $recipeCount);
        $this->info('Created this month: ' . $differenceRecipeCreated);
        $this->info('Updated this month: ' . $differenceRecipeUpdated);

        $this->info('--------------------------');

        $this->info('Our users posted this many comments: ' . $commentCount);
        $this->info('That\'s ' . $commentCountDifference . ' more comments since ' . $from);

        return;
    }
}
