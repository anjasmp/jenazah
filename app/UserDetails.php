<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Alfa6661\AutoNumber\AutoNumberTrait;

class UserDetails extends Model
{
    use SoftDeletes;
    use AutoNumberTrait;

    protected $guarded = [];

    protected $hidden = [

    ];

    public function user(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

    public function user_families(){
        return $this->hasMany(UserFamilies::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'no_anggota' => [
            'format' => function () {
                return date('Y') . 'P' . substr($this->no_kk, 0, 6)  . '?'; // autonumber format. '?' will be replaced with the generated number.
            },
            'length' => 5 // The number of digits in the autonumber
            ]
        ];
    }

}
