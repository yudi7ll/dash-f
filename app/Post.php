<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    private $path = 'public/posts/';
    protected $fillable = [
        'title',
        'published',
        'description',
        'cover',
        'body',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function setBodyAttribute($value)
    {
        $filename = md5(time()) . '.md';
        $fullPath = $this->path . $filename;

        Storage::put($fullPath, $value);

        $this->attributes['body'] = $filename;
    }

    public function getBodyAttribute($value)
    {
        return Storage::get($this->path . $value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function slugGenerator($title)
    {
        return Str::slug($title, '-') .'-'. substr(md5(time()), 0, 5);
    }
}
