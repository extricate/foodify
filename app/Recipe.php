<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $guarded = [];

    public function path()
    {
        return "/recipes/{$this->slug}";
    }
    public function creator()
    {
        return $this->belongsToMany(User::class, 'id');
    }
}
