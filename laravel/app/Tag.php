<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }

    public function getHashtagAttribute(): string
    {
        return '#' . $this->name;
    }
}
