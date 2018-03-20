<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function usedIn()
    {
        return $this->belongsToMany(Recipe::class)->getResults();
    }

    public function storedIn()
    {
        return $this->belongsToMany(Pantry::class)->getResults();
    }
}
