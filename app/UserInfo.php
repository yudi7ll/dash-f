<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bio',
        'twitter',
        'github',
        'linkedin',
        'instagram',
        'facebook',
        'website',
        'work_as',
        'work_at',
        'birth_date',
    ];

    /**
     * Disable timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Set the user_id to be auth id
     *
     * @return void
     */
    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] = auth()->user()->id;
    }

    /**
     * @RELATIONS
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
