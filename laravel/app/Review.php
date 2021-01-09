<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title', 'star', 'body', 'reviewer_id', 'reviewed_id', 'matching_id',
    ];

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewed()
    {
        return $this->belongsTo(User::class, 'reviewed_id');
    }
}
