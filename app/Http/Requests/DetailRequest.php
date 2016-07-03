<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DetailRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        $rules = [
            'firstname' => 'required|alpha',
            'middlename' => 'alpha',
            'lastname' => 'alpha',
            'date_of_birth' => 'date',
            'retirement' => 'date',
            'contact_mobile' => 'numeric|max:10',
            'contact_home' => 'numeric|max:10',
            'contact_work' => 'numeric|max:10',
            'email_personal' => 'email',
            'email_work' => 'email',
            'email_other' => 'email',
            'city_permanent' => 'alpha',
            'state_permanent' => 'alpha',
            'country_permanent' => 'alpha',
            'city_current' => 'alpha',
            'state_current' => 'alpha',
            'country_current' => 'alpha',
            'city_work' => 'alpha',
            'state_work' => 'alpha',
            'country_work' => 'alpha',
            'city_alternate' => 'alpha',
            'state_alternate' => 'alpha',
            'country_alternate' => 'alpha',
            'photo' => 'present|image',
            'members' => 'numeric',
            'website' => 'url',
            'fb' => 'active_url',
            'google' => 'active_url',
            'linkedin' => 'active_url'
        ];

        return $rules;
    }
}
