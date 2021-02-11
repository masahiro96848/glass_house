<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    protected $fillable = ['apply_id', 'approve_id','offer_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function apply()
    {
        return $this->belongsTo(User::class, 'apply_id');
    }

    public function approve()
    {
        return $this->belongsTo(User::class, 'approve_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }
}
