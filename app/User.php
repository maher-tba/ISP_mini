<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    ########################### start Roles methods ########################

    ######################## to get all user roles ####################
    public function Roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    ##############check if any role in Array are Existing ###############
    public function hasAnyRoles($roles){
        if($this->Roles()->whereIn('name',$roles)->first()){
            return true;
        }
        return false;
    }

    ############## check if any role attached to user ###############
    public function hasRole($role){
        if($this->Roles()->where('name',$role)->first()){
            return true;
        }
        return false;
    }

    ########################### end Roles methods ########################

    ########################### start telegram Relationship ########################
    public function telegram(){
        return $this->hasOne('App\telegram');
    }
    ########################### end telegram Relationship ########################

}
