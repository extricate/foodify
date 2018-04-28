<?php

namespace App\Http\ViewComposers;

use App\FoodPlan;
use Illuminate\View\View;

class WeekPlanComposer
{
    protected $plan;
    /**
     * Create a foodplan composer
     */
    public function __construct(FoodPlan $plan)
    {
        $this->plan = auth()->user()->food_plan();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('plan', $this->plan);
    }
}