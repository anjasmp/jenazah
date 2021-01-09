<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;


class Transaction extends Model
{
    use AutoNumberTrait;

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

    public function getAutoNumberOptions()
    {
        return [
            'id' => [
                'format' => date('Y') . 'INV-?', // autonumber format. '?' will be replaced with the generated number.
                'length' => 5 // The number of digits in an autonumber
            ]
        ];
    }



}
