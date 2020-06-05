<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{
    protected $guarded = [];
    /**
     * Get the user record associated with the invoice.
     */
    public function invoice()
    {
        return $this->hasOne('App\Invoice');
    }
}
