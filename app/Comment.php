<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'likes',
    ];

    /**
     * Set the user_id attributes to auth $id
     *
     * @return void
     */
    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->id();
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
