<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function summary()
    {

        return $this->hasMany('App\Summary', 'user_id', 'id')->orderby('id','desc');
    }

    public function material()
    {

        return $this->hasMany('App\Material', 'user_id', 'id')->orderby('id','desc');
    }

     public function verified()
    {
        $this->email_verification= 1;
        $this->email_token = null;
        $this->save();
    }
}