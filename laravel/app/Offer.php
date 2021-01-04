<?php

namespace App;

use App\Enums\OfferType;
use BenSampo\Enum\Traits\CastsEnums;
use BenSampo\Enum\Tests\Enums\UserType;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use CastsEnums;

    protected $fillable = [
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    protected $enumCasts = [
        'status' => OfferType::class,
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'offers');
    }

    public function matchings()
    {
        return $this->hasMany(Matching::class, 'offer_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }


}