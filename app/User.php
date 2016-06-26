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
        'name', 'email', 'password', 'contact', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeSeniors($query) {
        return $query->where('type', '=', '2');
    }    

    /**
     * a user has a detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     **/
    public function detail() {
        return $this->hasOne('App\Detail');
    }

    /**
     * a user has many workexperiences
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function work_experiences() {
        return $this->hasMany('App\WorkExperience');
    }
}
