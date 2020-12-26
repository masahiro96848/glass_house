<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'status'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'offers');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}