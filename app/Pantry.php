<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pantry extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class)->getResults();
    }
    public function contains()
    {
        return $this->hasMany(Ingredient::class)->getResults();
    }
}
