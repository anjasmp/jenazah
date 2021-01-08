<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $dates = ['date'];

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon::parse($value)->format('m/d/Y');
    }
}

