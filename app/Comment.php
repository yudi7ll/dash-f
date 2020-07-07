<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'likes',
    ];

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->id();
    }

    public function setLikesAttribute($value)
    {
        $this->attributes['likes'] = (int) $value;
    }

    /**
     * @RELATIONS
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
