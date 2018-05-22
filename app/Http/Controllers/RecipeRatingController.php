<?php

namespace App\Http\Controllers;

use App\FoodPlan;
use App\RecipeRating;
use Illuminate\Http\Request;

class RecipeRatingController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'int|required|in:1,2,3,4,5',
            'recipe' => 'required|exists:recipes,id'
        ]);

        // check whether a rating already exists
        $check = RecipeRating::where([
            ['recipe_id', '=', $request->recipe],
            ['issuer', '=', auth()->user()->id]
        ])->get();

        if (!$check->isEmpty()) {
            return redirect()->back()->with('message', 'You have already rated this recipe');
        }

        $recipeRating = RecipeRating::create([
            'issuer' => auth()->user()->id,
            'recipe_id' => $request->recipe,
            'rating' => $request->rating
        ]);

        return redirect()->back()->with('message', 'Rating of ' . $recipeRating->rating . ' stars added!');
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
}
