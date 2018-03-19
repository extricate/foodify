<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pantry extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'id');
    }
    public function contains()
    {
        return $this->hasMany(Ingredient::class, 'id');
    }
}
