<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/recipes/{$this->id}";
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'id')->first();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id')->getResults();
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'id')->getResults();
    }

    /**
     * Eloquent relationship for Recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipeRating()
    {
        return $this->hasMany(RecipeRating::class);
    }

    /**
     * Function that returns the average rating of a recipe.
     *
     * @return mixed
     */
    public function averageRating(Recipe $recipe)
    {
        $average = $recipe->recipeRating()->avg('rating');
        $average = round($average, 0);

        if ($average == 0|null) {
            return $average = 'No rating';
        }
        return $average;
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite()
    {
        if ($this->favorites()->where('user_id', auth()->user()->id) == null)
        {
            // isn't favorite
            return false;
        }

        // is favorite
        return true;
    }
}
