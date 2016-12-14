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
    *
    * A user can have many articles.
    * @return \Illuminate\Database\Eloquent\Relations\hasMany
    * 
    */
    public function articles(){

        return $this->hasMany('App\Article');
    }

    /*
        public function isATeamManager(){

            return true;
        }
    */

    /*
        public function setPasswordAttribute($password){
    
            $this->attribute['password'] = mcrypt($password);
        }
        //$user->password = 'foobar';
        //The accessor will take 'foobar', and the mutator will mcrypt it
    */
}
