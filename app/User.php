<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
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
        return $this->hasMany(Recipe::class, 'id')->getResults();
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
        //return $this->hasOne(FoodPlan::class, 'id')->with(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])->getResults();
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
}
