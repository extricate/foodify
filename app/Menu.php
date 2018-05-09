<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = [];
    /**
     * Get all elements this menu has.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function elements()
    {
        return $this->belongsToMany('App\Page')->withTimestamps();
    }
}
