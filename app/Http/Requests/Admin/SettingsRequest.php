<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingsRequest extends FormRequest
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
            'email' => 'required',
            'phone' => 'required',
            'facebook' => 'required',
            'insta' => 'required',
            'whats_app' => 'required',
            'bank_name' => 'required',
            'commission' => 'required',
            'app_link' => 'required',
            'twitter' => 'required',
            'youtube' => 'required',
        ];
    }
}
