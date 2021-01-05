<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matching extends Model
{
    protected $fillable = ['apply_id', 'approve_id','offer_id'];

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
    
}
