<?php

namespace App\Traits;

use App\History;
use App\Foodplan;
use Illuminate\Support\Facades\Auth;

trait ConvertHistoryToFoodplan
{
    public function ConvertHistoryToFoodplan(History $history)
    {
        $foodplan = Auth::user()->food_plan();

        foreach (FoodPlan::days() as $day)
        {
            $foodplan->$day = $history->$day;
        }

        $foodplan->save();
    }
}