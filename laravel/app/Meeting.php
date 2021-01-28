<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = ['topic', 'agenda', 'start_at', 'statr_url', 'join_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
