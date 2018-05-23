<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $fillable = ['name', 'quantity', 'type', 'recipe'];

    public function usedIn()
    {
        return $this->belongsToMany(Recipe::class, 'id')->getResults();
    }

    public function storedIn()
    {
        return $this->belongsToMany(Pantry::class)->getResults();
    }
}
