<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
//    const UPDATED_AT = null;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'sendCode', 'email'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getUserInfo(){
        return $this->hasOne('App\UserInfo','userId','id');
    }

    public function getUserRate(){
        return $this->hasMany('App\Rate','userIdRate','id');
    }

    public function getUserPost(){
        return $this->hasMany('App\Posts','userId','id');
    }

    public function getUserPoint(){
        return $this->hasOne('App\Point','userId','id');
    }

    public function getFriendsFollow(){
        return $this->hasOne('App\FriendsFollow','userId','id');
    }

}
