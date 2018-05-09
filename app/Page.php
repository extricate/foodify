<?php

namespace App;

use Spatie\Tags;
use Laravel\Scout\Searchable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Page extends Model
{
    use Searchable;
    use HasSlug;
    use Tags\HasTags;
    use Searchable;

    protected $guarded = [];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function slug()
    {
        return '/page/' . $this->slug;
    }

    /**
     * Get the menus this page is in.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function inMenu()
    {
        return $this->belongsToMany('App\Menu')->withTimestamps();
    }
}
