<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable = [
        'apply_id', 'approve_id', 'status'
    ];

    public function approve()
    {
        return $this->belongsToMany(User::class, 'offers', 'id','approve_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}