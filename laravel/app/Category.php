<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name'];

    protected $table = 'categories';

    public function users()
    {
        return $this->belongsToMany(User::class, 'category_user', 'category_id', 'user_id')
                            ->using('App\CategoryUser')
                                ->withPivot('category_id')->withTimestamps();
    }
}
