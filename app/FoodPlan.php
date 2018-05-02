<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    public function isEmpty()
    {
        // default is that the plan is empty
        $isEmpty = true;
        foreach ($this->days() as $day) {
            if ($this->$day() == null) {
                // this day is empty so continue checking the rest
                continue;
            } else {
                // a day is filled with something so the plan is not empty
                $isEmpty = false;
            }
        }
        return $isEmpty;
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
        return $this->hasOne(Recipe::class, 'id', 'monday')->with('media')->getResults();
    }

    public function tuesday()
    {
        return $this->hasOne(Recipe::class, 'id', 'tuesday')->with('media')->getResults();
    }

    public function wednesday()
    {
        return $this->hasOne(Recipe::class, 'id', 'wednesday')->with('media')->getResults();
    }

    public function thursday()
    {
        return $this->hasOne(Recipe::class, 'id', 'thursday')->with('media')->getResults();
    }

    public function friday()
    {
        return $this->hasOne(Recipe::class, 'id', 'friday')->with('media')->getResults();
    }

    public function saturday()
    {
        return $this->hasOne(Recipe::class, 'id', 'saturday')->with('media')->getResults();
    }

    public function sunday()
    {
        return $this->hasOne(Recipe::class, 'id', 'sunday')->with('media')->getResults();
    }
}
