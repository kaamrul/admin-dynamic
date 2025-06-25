<?php

namespace App\Http\Requests\Admin\User\Client;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        // if($this->country_code && $this->phone) {
        //     $mobile = $this->country_code . '-' . $this->phone;
        //     $this->merge(['phone' => $mobile]);
        // }

        if ($this->dob) {
            $this->merge([
                'dob' => prepareDateValidate($this->dob)
            ]);
        }
    }

    public function rules()
    {
        return [
            // All Data For User Table
            'full_name'=> ['required', 'string', 'max:255'],
            'email'     => ['nullable', 'string', 'max:255'],
            'phone'     => ['required', 'string', 'min:11', 'max:11', 'phone:BD'],
            'dob'       => ['nullable', 'string', 'max:255', 'date'],
            'gender'    => ['nullable', 'string', 'max:255'],
            'location'  => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'address'    => ['nullable', 'string'],
            'customer_type' => ['required', 'string'],
            'avatar'    => ['nullable', 'file', 'max:1024','mimes:jpeg,jpg,png,gif'],
        ];
    }

    public function messages()
    {
        return [
            'mobile.phone_number'           => 'Only numbers (0-9) are allowed',
        ];
    }
}
