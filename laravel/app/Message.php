<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'offer_id', 'offered_id', 'commnet', 'board_id'
    ];
}
