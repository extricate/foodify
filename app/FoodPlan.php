<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodPlan extends Model
{
    public function owner()
    {
        $this->belongsTo(User::class);
    }
}
