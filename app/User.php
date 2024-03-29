<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function roles() {
        return $this->belongsToMany('App\Role');
    }

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function isAdmin() {
        if($this->role->name === 'administrator') {
            return true;
        }

        return false;
    }
}

