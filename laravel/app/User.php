<?php

namespace App;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
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

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_user');
    }

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

    public function revieweds()
    {
        return $this->hasMany(Review::class, 'reviewed_id');
    }

    public function meetings()
    {
        return $this->hasMany(Meeting::class);
    }

    public function liked()
    {
    return $this->belongsToMany(User::class, 'likes', 'liked_id', 'liking_id')->withTimestamps();
    }

    public function liking()
    {
        return $this->belongsToMany(User::class, 'likes', 'liking_id', 'liked_id')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ?(bool)$this->liked->where('id', $user->id)->count()
            : false;
    }       

    public function getCountLikesAttribute()
    {
        return $this->liked->count();
    }

    public function updateProfile(Array $params)
    {
        if(isset($params['binary_image'])) {
            $img = $params['binary_image'];
            $fileData = base64_decode($img);
            $fileName = $params['profile_image'];
            file_put_contents($fileData, $fileName);

            // $image = Storage::disk('s3')->putFile('myprefix', $fileName, 'public');
            // $image_path = Storage::disk('s3')->url($image);

            $this::where('name', $this->name)->update([
                'name' => $params['name'],
                'email' => $params['email'],
                'intro' => $params['intro'],
                'profile_image' => $image_path,
                'talk_theme' => $params['talk_theme'],
                'speaking' => $params['speaking'],
            ]);
        } else {
            $this::where('name', $this->name)->update([
                'name' => $params['name'],
                'email' => $params['email'],
                'intro' => $params['intro'],
                'talk_theme' => $params['talk_theme'],
                'speaking' => $params['speaking'],
            ]);
        }
        return ;
    }

    /**
     * 絞り込み・キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder
     * @param array
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, array $params): Builder
    {
      // $reviews = $this->withCount('reviews')->get();
      // キーワード検索
        if(!empty($params['keyword'])) {
            $query->where(function ($query) use ($params) {
            $query->where('name', 'like', '%'. $params['keyword'].  '%');    
            });
        }

      // レビュー件数
        if(!empty($params['review'])) {
          if($params == 'asc') {
            $this->revieweds()->orderBy('reviewed_id');
          }else if($params == 'desc') {
            $query->where('reviewed_id', '=', $params['desc'])->orderBy('reviewed_id', 'desc')->get();
          }
        }
        
        // dd($params);
      // いいね
      // if(!empty($params['like'])) {
      //   $query->where()
      // }
      // 日付順
      // if(!empty($params)) {
      //   if($value == 'asc') {
      //     $query->where('created_at', '=', $params['date'])->orderBy('created_at', 'asc');
      //   }else {
      //     $query->where('created_at', '=', $params['date'])->orderBy('created_at','desc');
      //   }
      
      // }
      
        return $query;
    }

    // public function scopeSelect($query, $sort)
    // {
    //   foreach($sort as $column => $direction) {
    //     $query->orderBy($column, $direction);
    //   }

    //   return $query;
    // }
}
