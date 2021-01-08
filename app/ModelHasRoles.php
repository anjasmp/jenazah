<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    protected $guarded = [
    ];

    public function userable()
    {
        return $this->morphTo();
    }
}
