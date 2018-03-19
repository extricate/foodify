<?php

namespace App\Http\ViewComposers;

use App\Recipe;
use Illuminate\View\View;

class RecipeComposer
{
    protected $recipes;
    /**
     * Create a recipe composer
     *
     */
    public function __construct(Recipe $recipes)
    {
        $this->recipes = $recipes;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('recipes', $this->recipes->all());
    }
}