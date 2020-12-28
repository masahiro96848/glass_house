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

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }


    public function messages()
    {
        return $this->belongsToMany(Message::class);
    }

    public function offer()
    {
        return $this->belongsToMany(Offer::class, 'offer_user', 'matching_id', 'offer_id');
    }

    public function matching()
    {
        return $this->belongsToMany(User::class, 'matchings', 'apply_id', 'approve_id');
    }

    public function approves()
    {
        return $this->belongsToMany(User::class, 'offers', 'approve_id', 'apply_id');
    }


    public function isOfferedBy(?User $user):bool
    {
        return $user
            ?(bool)$this->offers->where('id', $user->id)->count()
            : false;
    }
}
