<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
