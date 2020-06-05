<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];
    /**
     * Get the user record associated with the invoice.
     */
    public function lineitems()
    {
        return $this->hasMany('App\LineItem');
    }
}
