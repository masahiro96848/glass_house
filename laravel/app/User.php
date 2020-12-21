<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'intro', 'profile_image', 'talk_theme', 'speaking'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function offers()
    {
        return $this->belongsToMany('App\User', 'offers', 'offer_id', 'offered_id')->withTimestamps();
    }

    public function offered()
    {
        return $this->belongsToMany('App\User', 'offers', 'offered_id', 'offer_id')->withTimestamps();
    }

    public function isOfferedBy(?User $user):bool
    {
        return $user
            ?(bool)$this->offers->where('id', $user->id)->count()
            : false;
    }
}
