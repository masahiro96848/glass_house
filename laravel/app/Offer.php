<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'apply_id', 'approve_id', 'status'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'users' );
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}