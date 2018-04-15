<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Recipe extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    public function path()
    {
        return "/recipes/{$this->id}";
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'id')->first();
    }

    /**
     * Images and image handling
     */

    public function registerMediaCollections()
    {
        $this->addMediaCollection('recipes');
    }

    /**
     * Handling of additional relations
     */

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

        if ($average == 0 | null) {
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
        $userFavorites = $this->favorites()->getResults();

        // check whether there are favorites of this recipe at all
        if ($userFavorites != null) {
            // check whether the favorites that do exist belong to the current user
            $filtered = $userFavorites->where('user_id', auth()->user()->id);
            if ($filtered->isEmpty()) {
                return false;
            }
            return true;
        }
    }
}
