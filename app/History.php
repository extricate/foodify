<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class History extends Model
{
    protected $guarded = [];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner')->getResults();
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
}
