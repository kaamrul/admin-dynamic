<?php

namespace App\Http\Requests\Public\Profile;

use Illuminate\Foundation\Http\FormRequest;

class VerifyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'nominated_by' => ['required', 'integer', 'different:seconded_by'],
            'seconded_by'  => ['required', 'integer', 'different:nominated_by'],
        ];
    }
}
