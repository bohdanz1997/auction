<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = 'lot';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'birth_date',
        'description',
        'short_description',
        'main_picture',
        'start_datetime',
        'end_datetime',
        'user_id',
        'breed_id',
        'gender_id',
        'cert_id',
    ];

    public function auctions() {
        return $this->hasMany(Auction::class);
    }

    public function pictures() {
        return $this->hasMany(Picture::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function breed() {
        return $this->belongsTo(Breed::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }

    public function cert() {
        return $this->belongsTo(Cert::class);
    }
}
