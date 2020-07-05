<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    private $path;
    protected $fillable = ['user_id', 'content'];

    public function __construct()
    {
        $this->path = 'public/posts/';
    }

    public function setContentAttribute($value)
    {
        $filename = md5(time()) . '.md';
        $fullPath = $this->path . $filename;

        Storage::put($fullPath, $value);

        $this->attributes['content'] = $filename;
    }

    public function getContentAttribute($value)
    {
        return Storage::get($this->path . $value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
