<?php

namespace App;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AdminReport extends Model
{
    use HasSlug;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['id', 'from'])
            ->saveSlugsTo('slug');
    }

    public function path()
    {
        return "/admin/{$this->slug}";
    }
}
