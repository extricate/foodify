<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo(User::class, 'author')->getResults();
    }

    public function onRecipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
