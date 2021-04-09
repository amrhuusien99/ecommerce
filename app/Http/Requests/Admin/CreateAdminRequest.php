<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
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
            'email' => 'required|unique:admins,email',
            'name' => 'required',
            'phone' => 'required|unique:admins,phone',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|confirmed'
        ];
    }
}
