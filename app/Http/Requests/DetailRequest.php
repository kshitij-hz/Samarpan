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
            'contact_pager' => 'numeric|max:10',
            'contact_fax' => 'numeric|max:10',
            'email_personal' => 'email',
            'email_work' => 'email',
            'email_other' => 'email',
            'photo' => 'present|image',
            'members' => 'numeric'
            'website' => 'url',
            'fb' => 'active_url',
            'google' => 'active_url',
            'linkedin' => 'active_url'
        ];

        return $rules;
    }
}
