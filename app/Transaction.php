<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $guarded = [];


    public function product(){
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function user_detail(){
        return $this->hasOne(UserDetails::class, 'transactions_id', 'id');
    }

    public function services(){
        return $this->hasOne(Service::class, 'transactions_id', 'id');
    }

    public function invoice(){
        return $this->hasOne(Service::class, 'transactions_id', 'id');
    }



}
