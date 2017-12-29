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
        'name', 'email', 'password','lastname','gender','country','profileimage'
    ];

    /**
     * The attributes that should be hidden for arrays when fetced by eloquent
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
}
