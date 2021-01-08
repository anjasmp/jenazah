<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserFamilies extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function user_detail(){
        return $this->belongsTo(UserDetails::class, 'user_details_id', 'id');
    }


    public function services(){
        return $this->hasMany(Service::class);
    }

    // public function transactions()
    // {
    //     return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    // }
}
