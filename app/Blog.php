<?php

namespace App;

use Spatie\Tags;
use Spatie\Sluggable\HasSlug;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasSlug;
    use Searchable;
    use Tags\HasTags;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function path()
    {
        return "/blog/{$this->slug}";
    }
}
