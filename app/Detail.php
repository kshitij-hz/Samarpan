<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'middlename', 'lastname',
        'date_of_birth',
    	'contact_mobile', 'contact_mobile', 'contact_pager', 'contact_fax', 'contact_other',
    	'email_personal', 'email_other',
        'address_permanenet', 'city_permanent', 'state_permanent', 'country_permanent', 'pincode_permanent',
        'address_current', 'city_current', 'state_current', 'country_current', 'pincode_current',
        'address_alternate', 'city_alternate', 'state_alternate', 'country_alternate', 'pincode_alternate',
        'retirement',
        'biography', 'description',
        'goals', 'interests', 'expertise_in',
    	'fb', 'google', 'linkedin', 'skype',
        'photo',
        'cv',
        'website',
        'members'
    ];

    protected $dates = [
        'date_of_birth',
        'retirement'
    ];

    /**
     * a detail is of a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user() {
    	return $this->belongsTo('App\User');
    }
}
