<?php

namespace App;

use Spatie\Tags;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Recipe extends Model implements HasMedia
{
    use HasSlug;
    use HasMediaTrait;
    use Tags\HasTags;

    protected $guarded = [];

    /**
     * Generate slug from the name of the recipe
     * And return the slug as path to recipe
     *
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }

    public function path()
    {
        return "/recipes/{$this->slug}";
    }

    public function author()
    {
        return $this
            ->belongsTo(User::class, 'author', 'id')
            ->first();
    }

    /**
     * Images and image handling
     */

    public function registerMediaCollections()
    {
        $this->addMediaCollection('recipes');
    }

    /**
     * Handling of additional relationships
     */

//    public function tags()
//    {
//        return $this
//            ->hasMany(Tag::class, 'id')
//            ->getResults();
//    }

    public function ingredients()
    {
        return $this
            ->hasMany(Ingredient::class, 'id')
            ->getResults();
    }

    public function inPlans()
    {
        return $this
            ->hasMany(FoodPlan::class, ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday']);
    }

    /**
     * Eloquent relationship for Recipe.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipeRating()
    {
        return $this
            ->hasMany(RecipeRating::class);
    }

    /**
     * Function that returns the average rating of a recipe.
     *
     * @return mixed
     */
    public function averageRating(Recipe $recipe)
    {
        $average = $recipe
            ->recipeRating()
            ->avg('rating');
        $average = round($average, 0);

        if ($average == 0 | null) {
            return $average = 'No rating';
        }
        return $average;
    }

    /**
     * Favorites
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite()
    {
        $userFavorites = $this
            ->favorites()
            ->getResults();

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

    /**
     * Comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
