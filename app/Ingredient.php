<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function usedIn()
    {
        return $this->belongsToMany(Recipe::class, 'id');
    }

    public function storedIn()
    {
        return $this->belongsTo(Pantry::class, 'id');
    }
}
