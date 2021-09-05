<?php

namespace App\Http\Requests\Setting;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'site_name' => 'required',
            'tagline' => 'nullable',
            'site_logo' => 'nullable',
            'favicon' => 'nullable',

            // 'show_top_bar' => 'nullable',
            'email' => 'nullable',
            'mobile' => 'nullable',
            'address' => 'nullable',

            'price_unit' => 'nullable',

            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'youtube_url' => 'nullable',
            'linkedin_url' => 'nullable',
            'instagram_url' => 'nullable',       
        ];
    }
}
