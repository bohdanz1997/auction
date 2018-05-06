<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $table = 'bet';

    protected $fillable = [
        'price',
        'max_price',
        'user_id',
        'auction_id',
        'active'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
