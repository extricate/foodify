<?php

namespace App\Listeners;

use App\User;
use App\History;
use App\FoodPlan;
use Carbon\Carbon;
use App\Events\NewWeek;
use App\Events\FoodplansSavedToHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveFoodplansToHistory implements ShouldQueue
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
     * @param  NewWeek  $event
     * @return void
     */
    public function handle(NewWeek $event)
    {
        $users = User::all();
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
        }
        // all plans have been saved.
        event(new FoodplansSavedToHistory);
    }
}
