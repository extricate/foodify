<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    /**
     * The primary function of the suggest class is to suggest
     * a meal for the current user, based on its preferences
     * and its settings. The meal should serve the goals
     * of the user and should be based on the history.
     */
    public function suggestMeal()
    {
        // get the current user
        $user = auth()->user();

        // get the current user preferences
        //$preferences = $user->preferences();

        /**
         * Select recipes based on the user preferences, starting with the most common preference
         * and work down to the least common preference (based on results quantity), this
         * should be based on an actual analysis of the recipe database and updated
         * daily accordingly.
         */
        // $possible-recipes = Recipe::get->where(
    }
}
