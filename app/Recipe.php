<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/recipes/{$this->id}";
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'id')->first();
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'id')->getResults();
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class, 'id')->getResults();
    }
}
