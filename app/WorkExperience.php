<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company',
        'from',
        'to',
        'position',
        'description'
    ];

    protected $dates = [
    	'from', 'to'
    ];

    /**
     * the workexperience is of a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
