<?php

namespace App;

use Conner\Tagging\Taggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use Taggable;

    protected $path = 'public/posts/';
    protected $fillable = [
        'user_id',
        'title',
        'published',
        'description',
        'tags',
        'cover',
        'body',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->id();
    }

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->attributes['title'], '-')
            .'-' . Str::random(10);
    }

    public function setPublishedAttribute($value)
    {
        $this->attributes['published'] = $value === "on";
    }

    public function setBodyAttribute($value)
    {
        $filename = $this->attributes['slug'] . '.md';
        $fullPath = $this->path . $filename;

        Storage::put($fullPath, $value);

        $this->attributes['body'] = $filename;
    }

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

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
