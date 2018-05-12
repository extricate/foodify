<?php

namespace App;

use Spatie\Tags\HasSlug;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class AdminReport extends Model
{
    use HasSlug;
    use Searchable;

    protected $guarded = [];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom(['id', 'created_at'])
            ->saveSlugsTo('slug');
    }

    public function path()
    {
        return "/admin/{$this->slug}";
    }
}
