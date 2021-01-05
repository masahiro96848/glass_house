<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'title', 'star', 'body', 'reviewer_id', 'reviewed_id',
    ];

    
}
