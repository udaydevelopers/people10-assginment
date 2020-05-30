<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    /**
     * Get the user record associated with the post.
     */
    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
