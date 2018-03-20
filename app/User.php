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

    public function pantry()
    {
        return $this->hasOne(Pantry::class, 'id')->getResults();
    }

    public function food_plan()
    {
        return $this->hasOne(FoodPlan::class, 'id')->getResults();
    }
}
