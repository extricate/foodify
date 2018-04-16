<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeRating extends Model
{
    protected $guarded = [];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class, 'recipe');
    }

    public function issuer()
    {
        return $this->belongsTo(User::class, 'issuer');
    }
}
