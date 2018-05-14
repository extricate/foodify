<?php

namespace App\Listeners;

use App\User;
use App\Recipe;
use App\Events\FoodplansSavedToHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\FoodplansHaveBeenGenerated;

class GenerateFoodplans implements ShouldQueue
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
     * @param  FoodplansSavedToHistory  $event
     * @return void
     */
    public function handle(FoodplansSavedToHistory $event)
    {
        $users = User::all();
        foreach ($users as $user) {
            $foodplan = $user->food_plan();
            $foodplanArray = [];
            foreach ($foodplan->days() as $day) {
                $foodplan->$day = Recipe::inRandomOrder()
                    ->whereNotIn('id', $foodplanArray)
                    ->first()
                    ->id;

                array_push($foodplanArray, $foodplan->$day);
            }
            $foodplan->save();
        }
        event(new FoodplansHaveBeenGenerated);
    }
}
