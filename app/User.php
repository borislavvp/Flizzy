<?php

namespace App;

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
        'name', 'email', 'password','role_id','photo_id','is_active','google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function isAdmin(){
        if(!is_null($this->role)) {
            if ($this->role->name == 'administrator' && $this->is_active == 1) {
                return true;
            } else {
                return false;
            }
        }else {
            return false;
        }
    }
}
