<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function recipes()
    {
        return $this->belongsToMany(Recipe::class);
    }
}
