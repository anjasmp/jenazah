<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $guarded = [];

    public function transactions()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
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
