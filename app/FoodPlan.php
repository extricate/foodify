<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodPlan extends Model
{
    protected $guarded = [];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function plan()
    {
        $plan = [];

        foreach ($this->days() as $day) {
            $plan[] = $this->$day;
        }
    }
    public function owner()
    {
        return $this->belongsTo(User::class)->getResults();
    }


    /**
     * Food plan day configuration
     */
    static function days()
    {
        $days = array(
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
            'sunday'
        );
        return $days;
    }

    public function monday()
    {
        return $this->hasOne(Recipe::class, 'id', 'monday')->getResults();
    }

    public function tuesday()
    {
        return $this->hasOne(Recipe::class, 'id', 'tuesday')->getResults();
    }

    public function wednesday()
    {
        return $this->hasOne(Recipe::class, 'id', 'wednesday')->getResults();
    }

    public function thursday()
    {
        return $this->hasOne(Recipe::class, 'id', 'thursday')->getResults();
    }

    public function friday()
    {
        return $this->hasOne(Recipe::class, 'id', 'friday')->getResults();
    }

    public function saturday()
    {
        return $this->hasOne(Recipe::class, 'id', 'saturday')->getResults();
    }

    public function sunday()
    {
        return $this->hasOne(Recipe::class, 'id', 'sunday')->getResults();
    }
}
