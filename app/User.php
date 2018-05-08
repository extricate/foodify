<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function slug()
    {
        return '/users/' . $this->name . '-' . $this->id;
    }

    public function created_recipes()
    {
        return $this->hasMany(Recipe::class, 'author')->getResults();
    }

    public function recipes()
    {
        return Recipe::where('author', '=', auth()->user()->id)->paginate(6, ['*'], 'recipes');
    }

    public function recipeRatings()
    {
        return $this->hasMany(RecipeRating::class);
    }

    public function pantry()
    {
        return $this->hasOne(Pantry::class, 'id')->getResults();
    }

    public function food_plan()
    {
        return $this->hasOne(FoodPlan::class, 'owner')->getResults();
    }

    public function history()
    {
        return $this->hasMany(History::class, 'owner')->getResults();
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class)->getResults();
    }

    public function showFavorites()
    {
        return Favorite::where('user_id', '=', auth()->user()->id)->paginate(6, ['*'], 'favorites');
    }

    /**
     * Get all user comments
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function isAdmin()
    {
        if ($this->admin == true) {
            return true;
        }
        return false;
    }

    public function latestUsers(Int $amount = 6)
    {
        return User::all()->sortByDesc('created_at')->take($amount);
    }
}
