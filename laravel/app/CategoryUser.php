<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;

class CategoryUser extends Pivot
{
    protected $table = 'category_user';
}
