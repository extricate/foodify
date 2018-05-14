<?php

namespace App\Listeners;

use App\User;
Use App\Recipe;
use App\Comment;
use Carbon\Carbon;
use App\AdminReport;
use App\Events\NewMonth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateAdminReport implements ShouldQueue
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

        // generate admin report object in database
        AdminReport::create([
            'from' => $from,
            'till' => $till,

            'recipeCount' => $recipeCount,
            'differenceRecipeCreated' => $differenceRecipeCreated,
            'differenceRecipeUpdated' => $differenceRecipeUpdated,

            'userCount' => $userCount,
            'userCountDifference' => $userCountDifference,

            'commentCount' => $commentCount,
            'commentCountDifference' => $commentCountDifference,
        ]);
    }
}
