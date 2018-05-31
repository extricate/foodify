<?php

namespace App\Listeners;


use App\User;
use App\Recipe;
use Illuminate\Support\Facades\Mail;
use App\Events\FoodplansSavedToHistory;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\FoodplansHaveBeenGenerated;
use App\Mail\SendNewFoodplanGeneratedMail;

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
            if (!$user->getSetting('no_automatic_foodplans')) {
                $foodplan = $user->food_plan();
                $foodplanArray = [];

                // mock select based on preferences by just randomly selecting recipes
                foreach ($foodplan->days() as $day) {
                    $foodplan->$day = Recipe::inRandomOrder()
                        ->where('deleted', false) // exempt soft-deleted recipes from being placed in foodplans
                        ->whereNotIn('id', $foodplanArray) // do not duplicate multiple recipes per week
                        ->first()
                        ->id;

                    array_push($foodplanArray, $foodplan->$day);
                }
                $foodplan->save();

                Mail::send(new SendNewFoodplanGeneratedMail($user));

                // $job = (new SendNewFoodplanGeneratedMail($user))->delay(15);
                // $this->dispatch($job);
            }

        }
        event(new FoodplansHaveBeenGenerated);
    }
}
