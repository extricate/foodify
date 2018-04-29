<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Tags\HasSlug;

class Blog extends Model
{
    use HasSlug;

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function path()
    {
        return "/blog/{$this->slug}";
    }
}
