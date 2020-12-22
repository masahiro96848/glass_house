<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $fillable = [
        'offer_id', 'offered_id'
    ];
}
