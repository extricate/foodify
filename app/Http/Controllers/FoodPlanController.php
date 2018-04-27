<?php

namespace App\Http\Controllers;

use App\Traits;
use Validator;
use App\Recipe;
use App\FoodPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodPlanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $foodplan = $user->food_plan();
        if ($foodplan == null) {
            $this->create();
        };

        return view('modules.foodplan.index', compact('foodplan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $foodplan = FoodPlan::create([
            'owner' => auth()->user()->id,
        ]);

        return $foodplan;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plan = FoodPlan::create([
            'owner' => auth()->user()->id,
            'description' => $request->description,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\foodPlan  $food_plan
     * @return \Illuminate\Http\Response
     */
    public function show(FoodPlan $food_plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\foodPlan  $food_plan
     * @return \Illuminate\Http\Response
     */
    public function edit(FoodPlan $food_plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\foodPlan  $food_plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        $foodplan = $user->food_plan();

        $validator = Validator::make($request->all(), [
            'day' => 'string|required|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'recipe' => 'nullable|exists:recipes,id'
        ])->validate();

        $recipe = $request->recipe;

        // clearing a recipe from a plan?
        if ($request->recipe == 0|null) {
            $recipe = null;
        }

        // update recipe set for a day in a plan
        $day = $request->day;
        $foodplan->$day = $recipe;
        $foodplan->save();

        return redirect()->back()->with('message', 'Day recipe updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\foodPlan  $food_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodPlan $food_plan)
    {
        /**
         * you cannot 'destroy' a foodplan (considering all users need to have one,
         * thus we use this function to reset it instead.
         */

        $user = auth()->user();
        $foodplan = $user->food_plan();

        foreach($foodplan->days() as $day) {
            $foodplan->$day = null;
        }

        $foodplan->save();

        return redirect()->back()->with('message', 'Week reset!');

    }

    public function suggest()
    {
        $user = auth()->user();
        $foodplan = $user->food_plan();

        foreach($foodplan->days() as $day) {
            $foodplan->$day = Recipe::inRandomOrder()->first()->id;
        }

        $foodplan->save();

        return redirect()->back()->with('message', 'We\'ve suggest a new week plan for you!');

    }
}
