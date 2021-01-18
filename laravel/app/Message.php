<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'comment', 'to_user', 'from_user', 'matching_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user');
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }
}
