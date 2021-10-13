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
        'firstName', 'lastName', 'email', 'password',
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

    public function owner()
    {
        $this->where('post',4);
        return true;
    }

    public function manager()
    {
        $this->where('post',3);
        return true;
    }

    public function leader()
    {
        $this->where('post',2);
        return true;
    }

    public function superior() //マネージャー以上の判断
    {
        $this->where('post',4)->orWhere('post',3);
        return true;
    }
}
