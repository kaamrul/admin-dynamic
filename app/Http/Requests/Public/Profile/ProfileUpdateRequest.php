<?php

namespace App\Http\Requests\Public\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->country_code && $this->phone) {
            $mobile = $this->country_code . '-' . $this->phone;
            $this->merge(['mobile' => $mobile]);
        }
    }

    public function rules()
    {
        return [
            // All Data For User Table
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'max:255'],
            'mobile'     => ['required', 'string'],
            'dob'        => ['required', 'string', 'max:255'],
            'gender'     => ['nullable', 'string', 'max:255'],
            'ethnicity'  => ['nullable', 'string', 'max:255'],
            'location'   => ['nullable', 'string', 'max:255'],
            'avatar'     => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif'],

            // All Data for Address Table
            'home_street_address' => ['required', 'string', 'max:255'],
            'home_suburb'         => ['required', 'string', 'max:255'],
            'home_city'           => ['required', 'string', 'max:255'],
            'home_post_code'      => ['required', 'integer'],
            'home_latitude'       => ['nullable', 'string', 'max:255'],
            'home_longitude'      => ['nullable', 'string', 'max:255'],

            'postal_street_address' => ['required', 'string', 'max:255'],
            'postal_suburb'         => ['required', 'string', 'max:255'],
            'postal_city'           => ['required', 'string', 'max:255'],
            'postal_post_code'      => ['required', 'integer'],
            'postal_latitude'       => ['nullable', 'string', 'max:255'],
            'postal_longitude'      => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.phone_number' => 'Only numbers (0-9) are allowed',
        ];
    }
}
