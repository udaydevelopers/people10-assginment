<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];
    /**
     * Get the post of  that comments.
     */
    public function post()
    {
        return $this->belongsTo('App\Post');
    }
}
