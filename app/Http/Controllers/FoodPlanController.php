<?php

namespace App\Http\Controllers;

use Validator;
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
        $foodplan = Auth::user()->food_plan();
        if($foodplan == null) {
            $this->create();
        };

        return view('modules/foodplan/index', compact('foodplan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        $foodplan = FoodPlan::create([
            'owner' => $user->id,
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
    public function update(Request $request, FoodPlan $food_plan)
    {
        Validator::make($request->all(), [
            'day' => 'string|required'
        ])->validate();

        $user = Auth::user();

        $day = $request->day;
        $user->food_plan()->$day = 0;
        return redirect('plan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\foodPlan  $food_plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoodPlan $food_plan)
    {
        //
    }
}
