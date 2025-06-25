<?php

namespace App\Http\Requests\Admin\Config;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if ($this->country_code && $this->phone) {
            $phone = $this->country_code . '-' . $this->phone ;
            $this->merge(['phone' => $phone]);
        }

        // System Details Validation
        if ($this->system_details) {
            $systemDetails = $this->system_details;
            $this->merge(['system_details' => $systemDetails]);
        }

        // System Details Validation
        if ($this->preference) {
            $preferenceData = $this->preference;
            $this->merge(['preference' => $preferenceData]);
        }
    }

    public function rules()
    {
        return [
            // System Details
            'app_title'   => ['nullable', 'required_with:systemDetails', 'string', 'max:255'],
            'version'     => ['nullable', 'string', 'max:255'],
            'copyright'   => ['nullable', 'string', 'max:255'],
            'user_quota'  => ['nullable', 'string', 'max:255'],
            'website_url' => ['nullable', 'url', 'max:255'],

            // Preference
            'cancellation_hours'     => ['nullable', 'required_with:preferenceData', 'numeric'],
            // 'session_hours'          => ['nullable', 'required_with:preferenceData', 'numeric'],
            'walk_balance_alert'     => ['nullable', 'required_with:preferenceData', 'numeric'],
            'note_editable_duration' => ['nullable', 'required_with:preferenceData', 'numeric'],
            'walks_rate'             => ['nullable', 'required_with:preferenceData', 'numeric'],

            // Address
            'state'    => ['nullable', 'string', 'max:255'],
            'city'     => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:10'],
            'country'  => ['nullable', 'string', 'max:30'],
            'address'  => ['nullable', 'string', 'max:255'],

            // Communication
            'country_code' => ['nullable', 'string', 'max:255'],
            'phone'        => ['nullable', 'numeric'],
            'email'        => ['required_with:communication', 'string', 'max:255'],
            'contact_email'    => ['required_with:contact_us', 'string', 'max:255'],
            'quote_email'  => ['required_with:contact_us', 'string', 'max:255'],
            'ticket_email' => ['nullable', 'string', 'max:255'],

            // Multimedia
            'logo'           => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif'],
            'favicon'        => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif,JPEG'],
            'og_image'       => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif'],
            'login_logo'     => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif'],
            'login_bg_image' => ['nullable', 'file', 'max:500', 'mimes:jpeg,jpg,png,gif'],

            // Time Zone
            'date_format'  => ['required_with:dateTime', 'string', 'max:255'],
            'time_format'  => ['required_with:dateTime', 'string', 'max:255'],
            'app_timezone' => ['required_with:dateTime', 'string', 'max:255'],

            // Color
            'btn_primary'               => ['nullable', 'string', 'max:255'],
            'btn_secondary'             => ['nullable', 'string', 'max:255'],
            'btn_light'                 => ['nullable', 'string', 'max:255'],
            'btn_disabled'              => ['nullable', 'string', 'max:255'],
            'btn_primary_text'          => ['nullable', 'string', 'max:255'],
            'btn_secondary_text'        => ['nullable', 'string', 'max:255'],
            'btn_light_text'            => ['nullable', 'string', 'max:255'],
            'btn_primary_hover'         => ['nullable', 'string', 'max:255'],
            'btn_secondary_hover'       => ['nullable', 'string', 'max:255'],
            'btn_light_hover'           => ['nullable', 'string', 'max:255'],
            'btn_disabled_hover'        => ['nullable', 'string', 'max:255'],
            'btn_primary_text_hover'    => ['nullable', 'string', 'max:255'],
            'btn_secondary_text_hover'  => ['nullable', 'string', 'max:255'],
            'btn_light_text_hover'      => ['nullable', 'string', 'max:255'],
            'text_heading'              => ['nullable', 'string', 'max:255'],
            'general_text'              => ['nullable', 'string', 'max:255'],
            'card_heading'              => ['nullable', 'string', 'max:255'],
            'bg_color'                  => ['nullable', 'string', 'max:255'],
            'card_heading_text'         => ['nullable', 'string', 'max:255'],
            'card_bg'                   => ['nullable', 'string', 'max:255'],
            'table_heading'             => ['nullable', 'string', 'max:255'],
            'table_btn'                 => ['nullable', 'string', 'max:255'],
            'table_btn_hover'           => ['nullable', 'string', 'max:255'],
            'top_header'                => ['nullable', 'string', 'max:255'],
            'sidebar'                   => ['nullable', 'string', 'max:255'],
            'footer'                    => ['nullable', 'string', 'max:255'],

            //SEO
            'google_tag_id'           => ['nullable', 'string', 'max:255'],
            'google_review_api_key'   => ['nullable', 'string', 'max:255'],
            'google_review_place_id'  => ['nullable', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'phone.phone_number' => 'Only numbers (0-9) are allowed',
        ];
    }
}
