<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VendorsRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:vendors,email',
            'phone' => 'required|unique:vendors,phone',
            'address' => 'required',
            'delivery_cost' => 'required',
            'minimum_order' => 'required',
            'password' => 'required|confirmed'
        ];
    }
}
