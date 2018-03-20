<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function path()
    {
        return "/recipes/{$this->slug}";
    }
    public function contains()
    {
        return $this->hasMany(Recipe::class)->getResults();
    }
}
