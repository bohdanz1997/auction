<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $table = 'auction';

    protected $fillable = [
        'start_datetime',
        'end_plan_datetime',
        'end_datetime',
        'start_price',
        'max_price',
        'step',
        'message',
        'lot_id',
    ];

    public function lot() {
        return $this->hasOne(Lot::class);
    }
}
