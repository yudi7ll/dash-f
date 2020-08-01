<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use Taggable;

    /**
     * The path to post content
     *
     * @var string
     */
    protected $path = 'public/posts/';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'published',
        'description',
        'tags',
        'cover',
        'body',
    ];

    /**
     * The attribute name to be use as Route Key
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the user_id to be auth id
     *
     * @return void
     */
    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->id();
    }


    /**
     * Make slug attribute using title attribute
     *
     * @return void
     */
    public function setSlugAttribute()
    {
        $slug = Str::slug($this->attributes['title'], '-') . '-' . Str::random(10);
        $this->attributes['slug'] = $slug;
    }


    /**
     * Convert Published attribute to boolean
     *
     * @return void
     */
    public function setPublishedAttribute($value)
    {
        $this->attributes['published'] = $value === "on";
    }


    /**
     * Process body markdown & set the body attribute to be the filename
     *
     * @param string
     * @return void
     */
    public function setBodyAttribute($value)
    {
        $filename = $this->attributes['slug'] . '.md';
        $fullPath = $this->path . $filename;

        Storage::put($fullPath, $value);

        $this->attributes['body'] = $filename;
    }

    /**
     * Get body markdown content
     *
     * @param string
     * @return string
     */
    public function getBodyAttribute($value)
    {
        return Storage::get($this->path . $value);
    }

    /**
     * @RELATIONS
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
